<?php

namespace App\Http\Controllers;

use App\Models\apprendices;
use Illuminate\Http\Request;

class ApprendicesController extends Controller
{
    public function index()
    {
        $apprendices = apprendices::include()->get();
        return response()->json($apprendices);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:apprendices,email',
            'cellnumber' => 'required|max:50',
            'course_id' => 'nullable|exists:courses,id',
            'computer_id' => 'nullable|exists:computers,id'
        ]);

        $apprendice = apprendices::create($request->all());
        return response()->json($apprendice, 201);
    }
    
    public function show($id)
    {
        $apprendice = apprendices::include()->findOrFail($id);
        return response()->json($apprendice);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:apprendices,email,'.$id,
            'cellnumber' => 'required|max:50',
            'course_id' => 'nullable|exists:courses,id',
            'computer_id' => 'nullable|exists:computers,id'
        ]);

        $apprendice = apprendices::findOrFail($id);
        $apprendice->update($request->all());

        return response()->json($apprendice);
    }

    public function destroy($id)
    {
        $apprendice = apprendices::findOrFail($id);
        $apprendice->delete();

        return response()->json(['message' => 'Apprendice deleted successfully.']);
    }
}