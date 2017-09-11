<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Corp\User;
use Hash;
use Redirect;
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
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('home');
    }

}
