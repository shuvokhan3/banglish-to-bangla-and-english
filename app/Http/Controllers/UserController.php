<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController
{

    public function UserRegistration(Request $request): \Illuminate\Http\JsonResponse
    {
        User::create([
            'email' => $request->input("email"),
            'password' => $request->input("password")
        ]);

        return response()->json([
            'status' => "Success",
            'message' => 'Registration Successful'
        ],201);
    }
}
