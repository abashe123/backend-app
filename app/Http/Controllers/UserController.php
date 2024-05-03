<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Hash; 
use App\Models\User;

class UserController extends Controller
{
    public function register (Request $request) {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt ($request->password)

        ]);

    }

    public function testurl(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'rank' => $request->rank,
            'phone number' => $request->phonenumber,
            'password' => bcrypt ($request->password)

        ]);

        return $request->all();

        return response()->json([
            'status'=> true,
            'message'=>'User Created succesfully',
            'token'=>$user->createToken("API TOKEN")->plainTextToken
        ],200);
    }

    // Login the user
    public function loginUser(Request $request)
    {
            //validated
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
                ]);
        
            // // Attempt to log in the user
            // if (Auth::attempt($request->only('email', 'password'))) {
            //  // Authentication successful
            //     $user = Auth::user();
            }
            

        }

