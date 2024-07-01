<?php

namespace App\Http\Controllers;

use App\Models\AfterCategory;
use App\Models\Airplane;
use App\Models\BeforeCategory;
use App\Models\FlightCheck;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class FlightCheckController extends Controller
{
    public function index() {
        $lists = FlightCheck::with('airplane')->orderBy('time', 'desc')->paginate(6);
        return view('checklist.index',[
            'lists' =>$lists,
        ]);
    }
    public function create() {
        $airplanes = Airplane::all();
        // $users = User::all();
        return view('checklist.create',[
            'airplanes' => $airplanes,
            // 'users' => $users,
        ]);
    }
    public function store(Request $request)
    {
         $request->validate([
            'flytimes' => 'required|integer'
        ]);
        $list = FlightCheck::create([
            'flight_number' => $request->input('flytimes'),
            'time' => $request->input('time'),
            'airplane_id' => $request->input('airplane_id'),
        ]);
        $list->save();
        $after = $this->getData('excel/after.xlsx');
        $before = $this->getData('excel/before1.xlsx');
        $this->saveData($after,$list->id,'after');
        $this->saveData($before,$list->id,'before');
        
        return redirect()->route('checklist.index');
    }

    public function saveData($data,$checklistID,$type){
        foreach($data as $item){
            $dataInsert = [
                    'checklist_id' => $checklistID,
                    'user_id' => Auth::user()->id,
                    'name'=> $item[0],
                    'requirement'=> $item[1],
                    'method'=> $item[2],
                ];
                if($type == 'after'){
                     AfterCategory::create($dataInsert);
                }else{
                    BeforeCategory::create($dataInsert);
                }
        }
        return true;
    }

    public function getData($path){
        $filePath = public_path($path); 
        $spreadsheet = IOFactory::load($filePath);

        $sheet = $spreadsheet->getActiveSheet();

        $data = $sheet->toArray();
        unset($data[0]);
        return $data;
    }


    public function edit(Request $request, $id) {
        $checklist = FlightCheck::find($id);
        $airplanes = Airplane::all();
        return view('checklist.edit',[
            'checklist' => $checklist,
            'airplanes'=>$airplanes,
            'type' => $request->type ?? 'after',
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'flytimes' => 'required|integer'
        ]);
        $checklist = FlightCheck::where('id',$id)
            ->update([
                'flight_number' => $request->input('flytimes'),
                'time' => $request->input('time'),
                'airplane_id' => $request->input('airplane_id'),
            ]);
          return redirect('/checklist');
    }

    public function updateCategories(Request $request, $id)
    {
        $request->validate([
            'categories' => 'required|array',
            'type' => 'required|string|in:before,after',
        ]);

        $categoriesData = $request->input('categories');

        foreach ($categoriesData as $categoryId => $data) {
            if ($request->input('type') == 'before') {
                $category = BeforeCategory::findOrFail($categoryId);
            } else {
                $category = AfterCategory::findOrFail($categoryId);
            }

            $category->update($data);
        }

        return redirect()->route('checklist.show', $id)->with('success', 'Categories updated successfully!');
    }
    public function destroy($id){
        $lists = FlightCheck::find($id);
        $lists->delete();
        return redirect('/checklist');
    }
    public function show(Request $request, $id) {
        //  dd($id, $request->all());
        $checklist = FlightCheck::find($id);
        $airplanes = Airplane::all();
         if ($request->type == 'before') {
                $categories = BeforeCategory::where('checklist_id',$id)->get();
            } else {
                $categories = AfterCategory::where('checklist_id',$id)->get();
            }
        // dd($request->all());
        return view('checklist.show',[
            'checklist' => $checklist,
            'airplanes'=>$airplanes,
            'categories' => $categories,
            'type' => $request->type ,
        ]);
    }

    public function editAfter($id){
        $afters = AfterCategory::where('checklist_id',$id)->get();
        return view('checklist.after',compact('afters','id'));
    }

    public function editBefore($id){
        $befores = BeforeCategory::where('checklist_id',$id)->get();
        return view('checklist.before',compact('befores','id'));
    }
    public function updateAfter(Request $request, $id)
{
    $checklist = FlightCheck::findOrFail($id);
    $categoriesData = $request->input('categories');
    foreach ($categoriesData as $categoryId => $data) {
        $category = AfterCategory::findOrFail($categoryId);
        $category->update($data);
    }
    $categories = AfterCategory::where('checklist_id', $checklist->id)->get();
    return view('checklist.show', [
        'checklist' => $checklist,
        'categories' => $categories,
        'type' => 'after' 
    ]);
}
    public function updateBefore(Request $request, $id){
        $checklist = FlightCheck::findOrFail($id);
        $categoriesData = $request->input('categories');
        foreach ($categoriesData as $categoryId => $data) {
            $category = BeforeCategory::findOrFail($categoryId);
            $category->update($data);
        }
        $categories = BeforeCategory::where('checklist_id', $checklist->id)->get();
        return view('checklist.show', [
            'checklist' => $checklist,
            'categories' => $categories,
            'type' => 'before' 
        ]);
    }
    public function export(Request $request,$id)
    {
           $type = $request->type;
           if($type=='before'){
            $categories = BeforeCategory::where('checklist_id',$id)->get();
            $title = 'before';
           }else{
            $categories = AfterCategory::where('checklist_id',$id)->get();
            $title = 'after';
           }
            
            // dd($categories);
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        
        $sheet->setCellValue('A1', 'STT');
        $sheet->setCellValue('B1', 'Hạng mục');
        $sheet->setCellValue('C1', 'Yêu cầu');
        $sheet->setCellValue('D1', 'Phương pháp kiểm tra');
        $sheet->setCellValue('E1', 'Kết quả');
        $sheet->setCellValue('F1', 'Đánh giá');
        $sheet->setCellValue('G1', 'Ghi chú');

        
        

        $row = 2; 
        foreach ($categories as $key => $category) {
            $sheet->setCellValue('A' . $row, $key+1);
            $sheet->setCellValue('B' . $row, $category['name']);
            $sheet->setCellValue('C' . $row, $category['requirement']);
            $sheet->setCellValue('D' . $row, $category['check_method']);
            $sheet->setCellValue('E' . $row, $category['result']);
            $sheet->setCellValue('F' . $row, $category['evaluation']);
            $sheet->setCellValue('G' . $row, $category['note']);
            $row++;
        }

        
        $fileName = $title.'list_' . now()->format('Ymd_His') . '.xlsx';
    
    
        $tempFilePath = tempnam(sys_get_temp_dir(), $fileName);
        $writer = new Xlsx($spreadsheet);
        $writer->save($tempFilePath);

        
        return response()->download($tempFilePath, $fileName)->deleteFileAfterSend(true);
    }
     
}