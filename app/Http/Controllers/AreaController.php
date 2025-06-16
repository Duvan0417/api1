<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
public function index()
    {
        $areas = Area::include()->filter()->get();
        return response()->json($areas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:2000',
        ]);

        $area = Area::create($request->all());
        return response()->json($area, 201);
    }

    public function show($id)
    {
        $area = Area::include()->findOrFail($id);
        return response()->json($area);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:2000',
        ]);

        $area = Area::findOrFail($id);
        $area->update($request->all());

        return response()->json($area);
    }

    public function destroy($id)
    {
        $area = Area::findOrFail($id);
        $area->delete();

        return response()->json(['message' => 'Area deleted successfully.']);
    }
}
