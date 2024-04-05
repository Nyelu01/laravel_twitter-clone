<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //returning registration form
    public function register(){
        return view('Auth.register');
    }


    //saving userdata to the DB
    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required|string|max:40',
            'email' => 'required|email|max:20|unique:users',
            'password' => 'required|confirmed|min:8'
        ]);

        //Creating user using static method
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);

        // $user->createToken('user_token')->plainTextToken;

        return redirect()->route('dashboard')->with('success', 'Account created successfully');


    }


    public function login(){
        return view('Auth.login');
    }

    public function authenticate(Request $request){


        $user = User::where('email', $request->input('email'))->first();

        if ($user && Hash::check($request->input('password'), $user->password)) {

            // delete old user token
            $user->tokens()->delete();

            //creating new token
            $token = $user->createToken('user_token')->plainTextToken;

         return redirect()->route('dashboard')->with('success', 'Logged in successfully');
        }

        return redirect()->route('login')->withErrors(['email'=> 'No matching user found with the provided either email or password']);


    }
}

