<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Widgets\MainWidget;
use Cache;
use Illuminate\Http\Request;
class ProductController extends Controller
{
   // public function index($id)
    public function index(Request $request)
    {
      // print_r($request->all());
         $id=$request->id;
        // $path=$request->path();

        $akkord = new MainWidget();
        $akkord->init();
        $akkordeon= $akkord->run();
        $product=Product::where('id',$id)->first();
// добавление имен файлов в карусель flexslider
        $lab1= explode('.',$product->mini);
        $test1=strval($lab1[0]);
        $test2=strlen($test1);
        $alfa=substr($test1,2,10);
        $alfa2=$alfa+1;
        $alfa3=$alfa+2;
        $base=substr($test1,0,$test2-1);
        $common1=$base.$alfa2.'.'.$lab1[1];
        $common2=$base.$alfa3.'.'.$lab1[1];
        dump($product);
        $sells=Cache::get('sells');
        if(!$sells) {
            $sells=Product::where('category_id',$id)->where('sale',true)->limit(8)->get();
            Cache::put('sells',$sells, 60);
        }
        
        return view('product')->with(['akkordeon'=>$akkordeon ,'sells'=>$sells,'product'=>$product,'common1'=>$common1, 'common2'=>$common2]);
    }
}
