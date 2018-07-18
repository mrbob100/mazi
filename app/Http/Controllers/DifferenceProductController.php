<?php

namespace Corp\Http\Controllers;


use Illuminate\Http\Request;
use Session;
use Response;
use Corp\Models\Product;
use Corp\Models\Differenceprod;
class DifferenceProductController extends Controller
{
    public function index(Request $request)
    {
        $id=$request->id;
        $input = $request->except('_token');
        $cs=$input['cs'];
        $products=[];
        $promice=[];
        if($cs!=41)
        {
            if($cs==1)
            {
                Session::pull('Difference');
            }
           Session::push('Difference',['id'=>$id]);
            $content=view(env('THEME').'.products_digit_content')->with(['cs'=>$cs])->render();
            return Response::json(['success'=>true, 'content'=>$content]);
        } else{

                $ids= Session::pull('Difference');
                $i=0;
                foreach ($ids as $id)
                {
                    $num=$id['id'];
                    $products[$i]=Product::where('id',$num)->get();
                    $i++;
                }
            $i=0;
            foreach ($products as $prods)
            {
                $products[$i]=$prods->transform(function ($item, $key){
                    if(is_string($item->img) && is_object(json_decode($item->img))&& json_last_error()==JSON_ERROR_NONE)
                    {   $item->img=json_decode($item->img); }

                    if(is_string($item->exactlyType1) && is_object(json_decode($item->exactlyType1))&& json_last_error()==JSON_ERROR_NONE)
                    {   $item->exactlyType1=json_decode($item->exactlyType1); }

                    return $item;
                });
                $i++;
            }
   /*     $cnt=count($products);
for($i=0; $i<$cnt; $i++)
{

       $sa=$products[$i];
       $ss=$products[$i][0]['id'];
       $id=$sa[0]['id'];

      $name=$sa[0]['name'];
    $name=$products[$i][0]['name'];
  $img=$sa[0]['img']->max;


} */
            $diffprod=Differenceprod::all();
            $content=view(env('THEME').'.products_option01_content')->with(['products'=>$products,'diffprod'=>$diffprod])->render();
            return Response::json(['success'=>true, 'content'=>$content]);
            }



    }

}
