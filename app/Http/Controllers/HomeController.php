<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(\Auth::user()->role === 2)
        {
            return redirect()->route('EmployeeHome'); 
        }
        elseif(\Auth::user()->role === 4)
        {
            return redirect()->route('EmployeeHome');
        }
        elseif(\Auth::user()->role === 5)
        {
            return redirect()->route('EmployeeHome');
        }
        elseif(\Auth::user()->role === 3)
        {
            return redirect()->route('EmployeeHome');
        }
       // dd(\Auth::user()->role);
        dd('check home controller index method');
        // return view('home');
    }
}
