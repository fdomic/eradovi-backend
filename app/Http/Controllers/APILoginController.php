<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;


class APILoginController extends Controller
{
    public function login() {
        
        /*$user = new User; 
        $user->password = Hash::make('123456');
        $user->email = 'a@example.com';
        $user->name = 'M';
        $user->save();
        */

        $credentials = request(['email', 'password']);
      
      
            if (!$token = auth('api')->attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
    
            return response()->json([
                'token' => $token,
                'expires' => auth('api')->factory()->getTTL() * 60
            ]);

    
    }


}
