<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class CreateUserController extends Controller
{
    public function show(Request $request) {
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);
        $token = $user->createToken('user_token')->plainTextToken;
        $user->remember_token = $token;
        $user->save();
        $cache_user = Cache::rememberForever("user", function() {
            return $user = DB::select("SELECT * FROM users ORDER BY ID DESC LIMIT 1");
        });
        //dd($cache_user);
        return response()->json([
            "user" => $cache_user,
            "token" => $token
        ]);
    }
 
}
