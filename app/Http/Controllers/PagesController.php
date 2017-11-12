<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    
    public function __construct()
    {
    	$this->middleware('guest');
    }

    public function LoginPage()
    {
        return view('pages.login');
    }


    public function RegisterPage()
    {
    	return view('pages.register');
    }
}
