<?php

namespace App\Http\Controllers;

use App\Models\apprendices;
use App\Services\ApprendicesService;
use Illuminate\Http\Request;


class ApprendicesController extends Controller
{
    protected $apprendicesService;

    public function __construct(ApprendicesService $apprendicesService)
    {
        $this->apprendicesService = $apprendicesService;
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:55',
            'email' => 'required|email|max:55',
            'password' => 'required|string|max:55',
            'cellnumber' => 'required|string|max:55',
            'course_id' => 'required|integer|exists:courses,id',
            'computer_id' => 'required|integer|exists:computers,id',
        ]);
        $apprendices = $this->apprendicesService->create($request->all());
        return response()->json([
            'message' => 'creado correctamente',
            'data' => $apprendices,
        ], 201);
    }
}
