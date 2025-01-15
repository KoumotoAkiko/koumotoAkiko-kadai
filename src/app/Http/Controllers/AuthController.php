<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Models\Contact;
use Models\Category;
use Models\Member;

class AuthController extends Controller
{
    public function admin(){
        return view('admin');
    }
}
