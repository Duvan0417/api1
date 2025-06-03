<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingCenter;

class TrainingCenterController extends Controller
{
    public function index()
    {
        return response()->json(TrainingCenter::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'location' => 'required|max:255',
        ]);

        $center = TrainingCenter::create($request->all());
        return response()->json($center, 201);
    }

    public function show($id)
    {
        $center = TrainingCenter::findOrFail($id);
        return response()->json($center);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'location' => 'required|max:255',
        ]);

        $center = TrainingCenter::findOrFail($id);
        $center->fill($request->all())->save();

        return response()->json($center);
    }

    public function destroy($id)
    {
        $center = TrainingCenter::findOrFail($id);
        $center->delete();

        return response()->json(['message' => 'Training Center deleted successfully.']);
    }
}
