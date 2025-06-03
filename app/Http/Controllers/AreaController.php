<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    public function index()
    {
        return response()->json(Area::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $area = Area::create($request->all());
        return response()->json($area, 201);
    }

    public function show($id)
    {
        $area = Area::findOrFail($id);
        return response()->json($area);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $area = Area::findOrFail($id);
        $area->fill($request->all())->save();

        return response()->json($area);
    }

    public function destroy($id)
    {
        $area = Area::findOrFail($id);
        $area->delete();

        return response()->json(['message' => 'Area deleted successfully.']);
    }
}
