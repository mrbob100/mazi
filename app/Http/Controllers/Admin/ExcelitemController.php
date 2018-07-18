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
                'companies'=>$productCompany
            ];

            // dd($menu);
          //  $navigation = view(env('THEME') . '.admin.categories.navigation_category')->with('menu',$menu)->render();
          //  $this->vars = array_add($this->vars, 'navigation', $navigation);  // вывод навигации меню
            $content = view(env('THEME').'.admin.excels.inputCSV_checkbox')->with(['data'=>$data])->render();
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
      //  $items = Product::all();
        if ($request->isMethod('post'))
        {
            $cnt=count($inputs);
            $str='';
            $query=Product::select('code');

            foreach($inputs as $k=>$input)
            {
                if(isset($k)) {
                    if($k=='img')
                    {
                        $k='img->max';
                    }
                    $query->addSelect($k);
                }

            }





             $items=$query->get();

            //  $items=$this->p_rep->get($select,false,false ,false);
            //   $items=DB::table('products')->select($str)->get();
          //  $items=Product::all();
         //   $url=Storage::url('priceXML.xls');
            Excel::create('priceXML', function($excel) use($items) {
                $excel->sheet('ExportFile', function ($sheet) use ($items) {
                    $sheet->fromArray($items);
                });
                 //   })->export('xls');
            })->store('xls',storage_path('app/public'));
            return redirect()->back();
        }


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
