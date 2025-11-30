<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController
{

    public function UserRegistration(Request $request){
        User::create([
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
        ]);

        return $request->json([
            'status'=>'Success',
            'message' => 'User created successfully',
        ],201 );
    }
}
