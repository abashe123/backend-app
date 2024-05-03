<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function testurl(Request $request)
{
    $user = User::create($request->all());

    // Authenticate the newly created user
    Auth::login($user);

    // Optionally, return a response indicating success
    return response()->json(['message' => 'User created and authenticated successfully'], 200);
}



    public function loginuser(Request $request)
    {
        $request -> validate (['email', 'password']);

        if (Auth::attempt($request->only('email', 'password'))) {
            // Authentication passed
            return response()->json(['message' => 'User authenticated successfully']);
        } else {
            // Authentication failed
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }
}

   