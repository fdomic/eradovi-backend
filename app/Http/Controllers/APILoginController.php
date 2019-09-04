<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Auth;


class APILoginController extends Controller
{
    public function login() {
        
        $credentials = request(['email', 'password']);
      
        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        $user = User::where("email", "=", $credentials['email'])->first();
        $realUser = $user->getStudentOrProfesor();

        return response()->json([
            'token' => $token,
            'expires' => auth('api')->factory()->getTTL() * 60,
            'id' => $realUser->id,
            'user' => $user,
            'credentials' => Array(
                'isStudent' => $realUser->isStudent(),
                'isReferada' => $realUser->isReferada(),
                'isProfesor' => $realUser->isProfesor()
            )

        ]);
    }

    public function refresh() {
        
        $user = Auth::user();
        $realUser = $user->getStudentOrProfesor();

        return response()->json([
            'user' => $user,
            'credentials' => Array(
                'isStudent' => $realUser->isStudent(),
                'isReferada' => $realUser->isReferada(),
                'isProfesor' => $realUser->isProfesor()
            )

        ]);
    }

}
