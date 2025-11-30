<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController
{
    public function UserRegistration(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            // Validate input
            $validated = $request->validate([
                'email' => 'required|email|max:255|unique:users,email',
                'password' => 'required|string|min:8|confirmed', // requires password_confirmation field
            ]);

            // Create user with hashed password
            $user = User::create([
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']), // or Hash::make()
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Registration successful',
                'data' => [
                    'user' => [
                        'id' => $user->id,
                        'email' => $user->email,
                    ]
                ]
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $exception) {
            // Log the actual error for debugging
            \Log::error('User registration failed: ' . $exception->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'Registration failed. Please try again.'
            ], 500);
        }
    }
}
