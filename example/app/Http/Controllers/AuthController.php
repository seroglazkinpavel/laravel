<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registration(Request $request) {
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);
        $token = $user->createToken('user_token')->plainTextToken;
        $user->remember_token = $token;
        $user->save();
        return response()->json([
            "user" => $user,
            "token" => $token
        ]);
    }

    public function login(Request $request) {
        try {
            $user = User::where('email', '=', $request->email)->firstOrFail();
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('user_token')->plainTextToken;
                return response()->json([
                    "user" => $user,
                    "token" => $token
                ]);
            }
        }catch(Exception $e) {
            return $e;
        }
    }

    public function logout(Request $request) {
        try {
            $user = User::FindOrFail($request->id);
            $user->tokens()->delete();
            return response()->json([
                "message" => 'Вы вышли',
            ]);
            
        }catch(Exception $e) {
            return $e;
        }
    }
}
