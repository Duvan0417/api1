<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;

class ComputerController extends Controller
{
    public function index()
    {
        $computers = Computer::include();
        return response()->json($computers);
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required|max:50',
            'brand' => 'required|max:255',
        ]);

        $computer = Computer::create($request->all());
        return response()->json($computer, 201);
    }

    public function show($id)
    {
        $computer = Computer::include()->findOrFail($id);
        return response()->json($computer);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'number' => 'required|max:50',
            'brand' => 'required|max:255',
        ]);

        $computer = Computer::findOrFail($id);
        $computer->update($request->all());

        return response()->json($computer);
    }

    public function destroy($id)
    {
        $computer = Computer::findOrFail($id);
        $computer->delete();

        return response()->json(['message' => 'Computer deleted successfully.']);
    }
}
