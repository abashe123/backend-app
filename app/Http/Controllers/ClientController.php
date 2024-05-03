<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
 public function register (Request $request) {
        $user = Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt ($request->password)

        ]);

    }

    public function testurl(Request $request){
        $client = Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'rank' => $request->rank,
            'phone number' => $request->phonenumber,
            'password' => bcrypt ($request->password)

        ]);

        return $request->all();
    }
}
