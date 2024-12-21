<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function userlogout()
    {
        Auth::logout();
        return redirect('/Userlogin');
    }
}
