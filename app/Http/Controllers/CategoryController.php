<?php

namespace App\Http\Controllers;

use App\Models\AfterCategory;
use App\Models\BeforeCategory;
use App\Models\FlightCheck;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function update(Request $request, $id)
    {   
        $checklist = FlightCheck::findOrFail($id);
        foreach ($request->input('categories') as $categoryId => $data) {
            $category = $checklist->categories()->findOrFail($categoryId);
            $category->update($data);
        }

        return redirect()->route('checklist.show', $checklist->id)->with('success', 'Checklist updated successfully!');
    }
    
}
