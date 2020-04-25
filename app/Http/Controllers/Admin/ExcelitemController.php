<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Corp\Models\Excelitem;
use Excel;
use DB;
use Storage;
use Corp\Models\Product;
use Corp\Repositories\CategoriesRepository;
use Corp\Repositories\ProductsRepository;
use Menu;
use Corp\Models\Category;
use Response;

class ExcelitemController extends adminSiteController
{

    public function __construct(  ProductsRepository $p_rep, CategoriesRepository $c_rep)
    {
        parent::__construct(new \Corp\Repositories\DirectoriesRepository(new \Corp\Models\Directory));
        // $this->s_rep=$s_rep; // slider
        // $this->p_rep=$p_rep;  // portfolio
        $this->p_rep=$p_rep;  // products
        $this->c_rep=$c_rep;
        //   $this->bar='left'; // устанавливает сайт бар значения: left, right, no


    }


    public function index()
    {
        if(view()->exists(env('THEME').'.admin.excels.index'))
        {

            $request=Request::createFromGlobals();
            $inputs = $request->except('_token');
    $categories=Category::where([['parent_id',0],['id','<>',9999]])->get();
        //    $categories=Category::where([['id','<>',9999]])->get();
            $this->template=env('THEME').'.admin.excels.index';
            //    $users=$this->getUsers();

            //   $sas=$users->roles()->where('id',3);

           // $menu=$this->getMenu();
            $productCompany=[];

         $products=Product::all();
         $j=0;
            $productCompany[0]=  $products[0]->company;
         foreach($products as $product)
         {
             if($productCompany[$j]!=$product->company)
             {
                 $k=0;
                 for($i=0; $i<count($productCompany);$i++)
                 {
                    if($product->company==$productCompany[$i])
                    {
                        $k++;
                    }
                 }
                 if(!$k)
                 {
                     $j++;
                     $productCompany[$j]=$product->company;
                 }


             }

         }
         $cnt=count($productCompany);
            $data=[
                'title'=>'Таблица выбора фильтров продукции',
                'companies'=>$productCompany,

            ];

            // dd($menu);
          //  $navigation = view(env('THEME') . '.admin.categories.navigation_category')->with('menu',$menu)->render();
          //  $this->vars = array_add($this->vars, 'navigation', $navigation);  // вывод навигации меню
            $content = view(env('THEME').'.admin.excels.inputCSV_checkbox')->with(['data'=>$data,'categories'=> $categories])->render();
           $this->vars = array_add($this->vars, 'content', $content);  // вывод навигации меню
            return $this->renderOutput();

        }
        abort(404);

    }

    /**
     * import a file in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        if($request->file('imported-file'))
        {

            DB::table('excelitems')->truncate();
            $path = $request->file('imported-file')->getRealPath();
            $data = Excel::load($path, function($reader)
            {
            })->get();

            if(!empty($data) && $data->count())
            {
                foreach ($data->toArray() as $row)
                {
                    if(!empty($row))
                    {
                        $dataArray[] =
                            [
                                'heading'=>$row['rubrika'],
                                'category_id'=>$row['category'],
                                'company'=>$row['company'],
                                'name' => $row['name'],
                                'code' => $row['code'],
                                'description' => $row['description'],
                                'price' => $row['price'],
                                'termGuarantee' => $row['guarantee'],
                                'sclad' => $row['sclad'],
                                'linkToGood' => $row['reference'],
                                'linkToPhoto' => $row['img'],

                            ];
                    }
                }
                if(!empty($dataArray))
                {
                    Excelitem::insert($dataArray);
                    return back();
                }
            }
        }
        $items=[];
        return view(env('THEME').'.admin.excels.excelitems',['items'=>$items]);
    }


    /**
     * export a file in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        $request=Request::createFromGlobals();
        $inputs = $request->except('_token');
        $items='';
      //  $items = Product::all();
        if ($request->isMethod('post'))
        {
           // $cnt=count($inputs);
            $categories=[];
            $cat_child=[];
            $cat_id=[];
            $names=[];
            $str='';
            $query='category_id';
            $j=0; $j1=0;
            foreach($inputs as $k=>$input)
            {
               if(is_numeric($input))
               {
                  array_push($categories,$input);
                   $names[$j1]=$input;
                   $j1++;
               }
                 else
                 {
                     if($j==0)
                     {

                         $query=Product::select(['id','category_id']);
                         $query->addSelect($input);
                         $j++;
                     }

                    if($j==1) {
                        $j++;     continue;
                    }
                     $query->addSelect($input);
                 }


            }

         $products=$query->get();
            if(isset($inputs['Изображение']))
            {
                $products->transform(function ($item, $key){
                    if(is_string($item->img) && is_object(json_decode($item->img))&& json_last_error()==JSON_ERROR_NONE)
                    {   $item->img=json_decode($item->img); }
                    $item->img=$item->img->max;
                    return $item;
                });
            }


                $fin=[];
           $glob=[];
           $j=0;
           $cnt=count( $names);
            for($i=0; $i<$cnt; $i++)
            {
              $categories=Category::where('id',  $names[$i])->first();
              $parent_id=$categories->getCategory->parent_id;
              $nickname=$categories->getCategory->name; // амая высокая категория
              $groper=$categories->name; // категория товара
                $glob['nickname']=$nickname;
                $glob['groper']= $groper;
               foreach ($products as $product)
               {

                      if($product->category_id ==$names[$i] )
                      {
                        //  $products[$i]=json_decode( $products[$i]->img);
                        //  $products[$i]->img=$products[$i]->img->max;
                        $glob1=collect($glob);
                          $glob2=collect($product);
                        //  $str='"nickname"'.':'.'"'.$nickname.'"'.','.'"namecat"'.':'.'"'.$name.'"'.','.;
                          $fin[$j]= $glob1->merge($glob2 );

                        //  $fin[$j]=$product ;
                          $j++;
                      }

               }

           }

// здесь вставка  первых два поля

$prod=collect( $fin);
















  // здесь я должен сделать перебор категорий с выводом категории =0 и подкатегории




            //  $items=$this->p_rep->get($select,false,false ,false);
            //   $items=DB::table('products')->select($str)->get();
          //  $items=Product::all();
         //   $url=Storage::url('priceXML.xls');
            Excel::create('priceXML', function($excel) use( $prod) {
                $excel->sheet('ExportFile', function ($sheet) use ($prod) {
                    $sheet->fromArray( $prod);
                });
                 //   })->export('xls');
            })->store('xls',storage_path('app/public'));
           // return redirect()->back();
        }
        $content="Данные сброшены в файл";
        return Response::json(['success'=>true, 'content'=>$content]);
    }



    public function getMenu()
    {
        $menu=$this->c_rep->get();
        $mBuilder=Menu::make('MyNav1', function ($m) use ($menu) {
            foreach($menu as $item)
            {
                if($item->parent_id==0)
                {
                    $m->add($item->name,null)->id($item->id); // в пункт меню присваиваеется title , путь и id
                }
                else {
                    if($m->find($item->parent_id))  // поиск родительского элемента и он существует
                    {
                        $m->find($item->parent_id)->add($item->name,null)->id($item->id);
                    }

                }
            }
        });
        return $mBuilder;
    }

}
