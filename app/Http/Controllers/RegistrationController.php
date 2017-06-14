<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function create() {

    	return view('registration.create');

    }
    public function store() {

    	//Validation

    	$this->validate(request(), [

    		'name' => 'required',
    		'email' => 'required|unique:users|email',
    		'password' => 'required|confirmed'


    		]);

    	// Create and save user

    	$user = User::create([
        'name' => request('name'),
        'email' => request('email'),
        'password' => bcrypt(request('password'))
        ]);

    	//Sign in the user

    	auth()->login($user);

    	return redirect('/');

    }
}
