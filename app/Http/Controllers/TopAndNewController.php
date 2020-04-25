<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;
use Corp\Models\Product;
use Corp\Models\Category;
use Response;
class TopAndNewController extends Controller
{
    public function index()
    {
        $request=Request::createFromGlobals();
        $input = $request->except('_token');
        $products=0;
        $pr=$input['pr'];
        if($input['pr']==50)
        {

            $products=Product::where('hit',1)->get();
        }

        if($input['pr']==51)
        {
           $new=1;
            $products=Product::where('new', $new)->get();
        }
        $productsAt=0;

        if($products->isEmpty()) return false;
        $products->transform(function ($item, $key){
            if(is_string($item->img) && is_object(json_decode($item->img))&& json_last_error()==JSON_ERROR_NONE)
            {   $item->img=json_decode($item->img); }

            if(is_string($item->exactlyType1) && is_object(json_decode($item->exactlyType1))&& json_last_error()==JSON_ERROR_NONE)
            {   $item->exactlyType1=json_decode($item->exactlyType1); }
            return $item;
        });

        $content=view(env('THEME').'.products_newtop_content')->with(['products'=>$products,'pr'=>$pr])->render();
        return Response::json(['success'=>true, 'content'=>$content]);
    }
}
