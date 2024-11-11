<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        try {
            $email = $request->email;
            $usuario = User::where('email', $email)->first();
            if($usuario){
                if(Hash::check($request->password, $usuario->password)){
                    return response()->json([
                        'user' => $usuario,
                    ]);
                }
                return response()->json([
                    'error' => "password"
                ], 200);
            }
            return response()->json([
                'error' => "email"
            ], 200);
        } catch (Exception $e) {
            echo($e->getMessage());
            return response()->json(['error' => "Ocurrió un error inesperado"], 500);
        }
    }

    public function register(Request $request){
        try {
            $name = $request->name;
            $email = $request->email;
            $password = $request->password;

            $usuario = User::where('email', $email)->first();
            if($usuario){
                return response()->json([
                    'error' => "email"
                ], 200);
            }

            $usuario = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
            ]);

            return response()->json([
                'user' => $usuario,
            ]);
        }catch (Exception $e) {
            echo($e->getMessage());
            return response()->json(['error' => "Ocurrió un error inesperado"], 500);
        }
    }

}
