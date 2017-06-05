<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
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
    public function index(Request $request)
    {
      $user=Auth::user();
 if(!Auth::check()) {
     return redirect()->back();
 }
     dump($user);
 $user1=$user['login'];
 if($user['login']!='admin')  return redirect('');
        return view('home');
    }
}
