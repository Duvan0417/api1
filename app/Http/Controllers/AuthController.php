<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('email','password');
        if(!$token = JWTAuth::attempt($credentials)){
            return response()->json(['error'=>'Credenciales invalidas'],401);
        }
        return response()->json(['token'=>$token]);
    }
    public function me(){
        return response()->json(JWTAuth::parseToken()->authenticate());
    }
    public function logout(){
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json(['message'=> 'sesion iniciada']);
    }
    public function refresh(){
        $newToken = JWTAuth::refresh(JWTAuth::getToken());
        return response()->json(['tokens'=> $newToken]);
    }
}
