<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
    public function register(Request $request) {
        $this->validate($request, [
			'firstName' => 'required',
			'lastName' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required',
		]);
    	$user = new User;
    	$user->firstName = $request->firstName;
    	$user->lastName = $request->lastName;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->save();
    	return response()->json([
			'message' => 'User created succefully!'
		], 201);
    }
}
