<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use URL;
use Session;
use Corp\Models\quickInformation;

class QuickregisterController extends Controller
{
   public function index()
   {
       $request=Request::createFromGlobals();
       $input = $request->except('_token');

       if($request->isMethod('post')) {
           $rules = [
               'name' => 'required|max:255',
               'phone' => 'required||min:10',
           ];

           $this->validate($request, $rules);
           $productId= $input['productId'];

          $url= Session::pull('Quick');
              $quick=new quickInformation();
              $quick->name=$input['name'];
               $quick->phone=$input['phone'];
               $quick->url=$url[0]['url'];
               $quick->save();
           return redirect('/');
       } else {
           $productId= $input['id'];


       }


       $content=view(env('THEME').'.quickRegister_content')->with(['productId'=>$productId])->render();
       return Response::json(['success'=>true, 'content'=>$content]);
   }
}
