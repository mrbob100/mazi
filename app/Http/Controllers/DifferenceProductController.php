<?php

namespace Corp\Http\Controllers;


use Illuminate\Http\Request;
use Session;
use Response;
use Corp\Models\Product;
use Corp\Models\Category;
use Corp\Models\Differenceprod;
class DifferenceProductController extends Controller
{
    public function index(Request $request)
    {
        $id=$request->id;
        $input = $request->except('_token');
        $cs=$input['cs'];
        $producting=[];
        $products=[];
        $promice=[];
        $categories=[];
        $catcommon =[];
        $proc=[];
        $ids=[];
        $k=0;
        $j=0;

        if($cs!=41 && $cs!=43 && $cs!=57)
        {
            if($cs==1)
            {
                Session::pull('Difference');
            }
           Session::push('Difference',['id'=>$id]);
            $content=view(env('THEME').'.products_digit_content')->with(['cs'=>$cs])->render();
            return Response::json(['success'=>true, 'content'=>$content]);
        } else{


                $ids= Session::get('Difference');
                if($cs==43)
                {
                   // unset( $ids[$id]);


                        $cnt=count($ids);
                    for($i=0; $i<$cnt; $i++ )
                    {

                        if($ids[$i]['id']!=$id)
                        {
                            $proc[$k]=(array)$ids[$i];
                            $k++;
                        }

                        else $j=$i;
                    }
                    $ids=$proc;
                    Session::pull('Difference');
                    $cnt=count($ids);
                    for($i=0; $i<$cnt; $i++ )
                    {
                       $w=(integer)$ids[$i]['id'];
                        Session::push('Difference',['id'=>$w]);
                    }

                }
                // ввод категорий


                 $i=0; $j=0;
                foreach ($ids as $idm)
                {



                    $num=$idm['id'];
                        $promice=Product::where('id',$num)->get();
                    //$promice->load('categories');
                   // $name=$promice[0]->categories->name;
                     $category_id=$promice[0]->category_id;
               //      $cat='category_id'. $category_id;
               //      $categories=array_add($categories,$cat,$category_id);
 //____________________________________________________________________________________________________________________________________________________

                  $ckn=count($categories);

                  if($ckn)
                  {
                      $jpeg=0;
                      for($j=0; $j<$ckn; $j++)
                      {
                          $temp=$categories[$j];
                          if($temp== $category_id)
                          {
                              $jpeg=1; break;
                          }
                      }
                      if(!$jpeg) {
                                   $categories[$i]=$category_id; $i++;
                                 }
                  } else {
                           $categories[$i]=$category_id; $i++;
                          }
                    /*      $ckn=count($categories);

                        for($i=0; $i< $ckn;$i++)
                         {
                             $catcommon[$i]=array_pop($categories);
                         }
                     */
 //____________________________________________________________________________________________________________________________________________________

                        $products= $promice->transform(function ($item, $key){
                            if(is_string($item->img) && is_object(json_decode($item->img))&& json_last_error()==JSON_ERROR_NONE)
                            {   $item->img=json_decode($item->img); }

                            if(is_string($item->exactlyType1) && is_object(json_decode($item->exactlyType1))&& json_last_error()==JSON_ERROR_NONE)
                            {   $item->exactlyType1=json_decode($item->exactlyType1); }

                            return $item;
                        });
                    if($cs!=57)
                    {
                        array_push( $producting, $products);
                    } else {
                                if($id==$category_id)
                                {
                                    array_push( $producting, $products);
                                }
                           }


                 /*   else {

                                if($id!=$idm['id'])
                                {

                                    $num=$idm['id'];
                                    $promice=Product::where('id',$num)->get();
                                    $products= $promice->transform(function ($item, $key){
                                        if(is_string($item->img) && is_object(json_decode($item->img))&& json_last_error()==JSON_ERROR_NONE)
                                        {   $item->img=json_decode($item->img); }

                                        if(is_string($item->exactlyType1) && is_object(json_decode($item->exactlyType1))&& json_last_error()==JSON_ERROR_NONE)
                                        {   $item->exactlyType1=json_decode($item->exactlyType1); }

                                        return $item;
                                    });
                                    array_push($producting,$products);
                                }else
                                    {
                                    $j=$i;

                                    }
                    } */

                }

            $qntPages=count($categories);
           $products=[]; $prodCat=[];
            $cnt=count($producting);
            for($i=0; $i<$cnt;$i++)
            {
                $products[$i]=array_pop($producting);
                if(($cs==57) && ($products[$i][0]->category_id==$id))
                {
                    $prodCat[$i]= $products[$i];
                }
            }

            $diffprod=Differenceprod::all();

            if ($cs==57)
            {
                $products= $prodCat;
                $data=$this->vivodexactlyType($products);

                $name=Category::where('id',$category_id)->first();
                $category_id=$name->name;
                $content=view(env('THEME').'.products_option01_content')->with(['products'=>$products,'diffprod'=>$diffprod,'category_id'=>$category_id,'data'=>  $data])->render();
                return Response::json(['success'=>true, 'content'=>$content]);
            }
            $content=view(env('THEME').'.products_difIcons_content')->with(['products'=>$products,'diffprod'=>$diffprod,'categories'=>$categories])->render();
            return Response::json(['success'=>true, 'content'=>$content]);
            }



    }


    public function vivodexactlyType($products)
    {
        $wed=[]; $vivod=[]; $cnt=count($products); $spred=[];
        $i=0;
        foreach($products as $prod)
        {

            $item=$prod[0]->exactlyType1;
            foreach($item as $k=>$index)
            {
              $wed[$k][0]=  $k;
                $wed[$k][1]=$index;
                $spred[$i][$k][0]=$prod[0]->id;
                $spred[$i][$k][1]=$k;
                $spred[$i][$k][2]=$index;
//  $i - индекс продукта
//  $k - индекс характеристики в exactlyType1
//  $index - имя характеристики в exactlyType1
            }
                $i++;
        }
        // работаем с поставкой прочерков
        $i=0;
        foreach($wed as $k=>$item)
        {
            $vivod[$i] =$k;
            $i++;
        }
        unset($wed); $jump=[];
        for($i=0;$i<$cnt; $i++)
        {
             for($j=0;$j<count($vivod); $j++)
             {
                 $temp=$vivod[$j];
                 if(isset($spred[$i][$temp][1]))
                 {
                     $jump[$j][$i]=$spred[$i][$temp][2];
                 }
                 else {
                     $jump[$j][$i]="-";
                      }

             }

        }
            $data=[
              'vivod' =>$vivod,
                'jump'=>$jump
            ];
        return  $data;
    }




}
