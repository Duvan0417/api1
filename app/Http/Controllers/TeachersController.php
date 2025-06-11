<?php

namespace App\Http\Controllers;

use App\Models\teachers;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
public function index()
    {
        $teachers = teachers::include()->get();
        return response()->json($teachers);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:500|unique:teachers,email',
            'area_id' => 'required|exists:areas,id',
            'trainingcenter_id' => 'required|exists:training_centers,id'
        ]);

        $teacher = teachers::create($request->all());
        return response()->json($teacher, 201);
    }

    public function show($id)
    {
        $teacher = teachers::include()->findOrFail($id);
        return response()->json($teacher);
    } 

    public function update(Request $request, $id)
    {
        $teacher = teachers::findOrFail($id);
        
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:500|unique:teachers,email,' . $teacher->id,
            'area_id' => 'required|exists:areas,id',
            'trainingcenter_id' => 'required|exists:training_centers,id'
        ]);

        $teacher->update($request->all());
        return response()->json($teacher);
    }

    public function destroy($id)
    {
        $teacher = teachers::findOrFail($id);
        $teacher->delete();

        return response()->json(['message' => 'Teacher deleted successfully.']);
    }
}

