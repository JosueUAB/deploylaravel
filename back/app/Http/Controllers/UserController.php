<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function login(request $request){
        $email = $request->email;
        $password = $request->password;
        $user = User::where("email", $email)->first();
        if(!$user){
            return response()->json([
                "res" =>false,
                "message" => "Usuario no encontrado"
            ],status:200);
        }else{{
            if(hash::check($password, $user->password)){
                
                $token = $user->createToken('auth_token')->plainTextToken;
                return response()->json([
                    "res" =>true,
                    "message" => "Bienvenido",
                    
                    "user" => $user,
                    "token" => $token
                ],status:200);
            }else{
                return response()->json([
                    "res" =>false,
                    "message" => "Contraseña incorrecta"
                ],status:200);
            }
        }

    }
   
}
public function logout(Request $request ){
    $user = $request->user();
    $user->tokens()->delete();
    return response()->json([
        "res" =>true,
        "message" => "Sesion cerrada"
    ],status:200);
}}
