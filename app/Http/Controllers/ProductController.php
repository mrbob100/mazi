<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index(Request $request)
    {
         if(Request::has('id')) $id=Request::__get('id');
         $sa=$id;
    }
}
