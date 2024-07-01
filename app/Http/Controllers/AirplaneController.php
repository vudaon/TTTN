<?php

namespace App\Http\Controllers;

use App\Models\Airplane;
use App\Models\FlightCheck;
use Illuminate\Http\Request;

class AirplaneController extends Controller
{
    public function index() {
         $airplanes = Airplane::paginate(6);
        return view('airplanes.index',[
            'airplanes' => $airplanes,
        ]);}
     public function create() {

        $airplanes = Airplane::all();
        return view('airplanes.create',[    
            'airplanes' => $airplanes,

        ]);
    }    
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|string',
        'code' => 'required|string',
        'numbers' => 'required|integer|min:1'
        ]);
        $airplane = Airplane::create([
            'name' => $request->input('name'),
            'code' => $request->input('code'),
            'count_fly' => $request->input('numbers'),
        ]);

        $airplane->save();
        return redirect('/airplanes')->with('success', 'Airplane created successfully.');
    }
     
    public function edit($id)
    {
        $airplanes = Airplane::find($id);
        return view('airplanes.edit')->with('airplanes',$airplanes);
    }

    public function update (Request $request, $id) {
        $request->validate([
        'name' => 'required|string',
        'code' => 'required|string',
        'numbers' => 'required|integer|min:1'
        ]);
        $airplanes = Airplane::where('id',$id)
            ->update([
                'name' => $request->input('name'),
                'code' => $request->input('code'),
                'count_fly' => $request->input('numbers'),
            ]);
            return redirect('/airplanes')->with('success', 'Airplane updated successfully.');
    }
    public function destroy($id){
        $list = FlightCheck::where('airplane_id',$id)->first();
        if($list != null){
            $list->delete();
        }
        $airplanes = Airplane::find($id);
        $airplanes->delete();
        return redirect('/airplanes')->with('success', 'Airplane deleted successfully.');
    }
    
    public function show($id) {
        $airplane = Airplane::find($id);
        return view('airplanes.show')->with('airplane',$airplane);
    }
    
}
