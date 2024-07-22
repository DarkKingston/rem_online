<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function login(){
        return Inertia::render('Login');
    }

    public function recovery(){
        return Inertia::render('Recovery');
    }

    public function register(){
        return Inertia::render('Recovery');
    }
}
