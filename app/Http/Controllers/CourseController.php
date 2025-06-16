<?php

namespace App\Http\Controllers;

use App\Models\course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
public function index()
    {
        $courses = Course::include()->filter()->get();
        return response()->json($courses);
    }

    public function store(Request $request)
    {
        $request->validate([
            'coursenumber' => 'required|max:255',
            'day' => 'required|max:50',
            'area_id' => 'required|exists:areas,id',
            'trainingcenter_id' => 'required|exists:training_centers,id'
        ]);

        $course = Course::create($request->all());
        return response()->json($course, 201);
    }

    public function show($id)
    {
        $course = Course::include()->findOrFail($id);
        return response()->json($course);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'coursenumber' => 'required|max:255',
            'day' => 'required|max:50',
            'area_id' => 'required|exists:areas,id',
            'trainingcenter_id' => 'required|exists:training_centers,id'
        ]);

        $course = Course::findOrFail($id);
        $course->update($request->all());

        return response()->json($course);
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return response()->json(['message' => 'Course deleted successfully.']);
    }
}
