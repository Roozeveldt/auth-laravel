<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }
    
    public function forgot()
    {
        return view('auth.forgot');
    }

    public function reset()
    {
        return view('auth.reset');
    }

}
