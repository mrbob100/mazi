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
        if(view()->exists(env('THEME').'.admin.handbooks.index'))
        {

            $data=[
                'title'=>'Таблица выбора фильтров продукции'
            ];


            //    $users=$this->getUsers();

            //   $sas=$users->roles()->where('id',3);


            $content = view(env('THEME').'.admin.excels.inputCSV')->with(['data'=>$data])->render();
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

                if($k=='category_id')$query->addSelect('category_id');
                if($k=='name')$query->addSelect('name');
                if($k=='description')$query->addSelect('description');
                if($k=='text')$query->addSelect('text');
                if($k=='price')$query->addSelect('price');
                if($k=='img')$query->addSelect('img');
                if($k=='type')$query->addSelect('type');
                if($k=='country')$query->addSelect('country');
                if($k=='groupTools')$query->addSelect('groupTools');
                if($k=='new')$query->addSelect('new');
                if($k=='hit')$query->addSelect('hit');
                if($k=='sale')$query->addSelect('sale');
                if($k=='weightbrutto')$query->addSelect('weightbrutto');
                if($k=='weightnetto')$query->addSelect('weightnetto');
                if($k=='width')$query->addSelect('width');
                if($k=='length')$query->addSelect('length');
                if($k=='height')$query->addSelect('height');
                if($k=='termGuarantee')$query->addSelect('termGuarantee');
                if($k=='class')$query->addSelect('class');
                if($k=='packing')$query->addSelect('packing');
                if($k=='company')$query->addSelect('company');
                if($k=='exactlyType1')$query->addSelect('exactlyType1');
                if($k=='sclad')$query->addSelect('sclad');
                if($k=='ukvd')$query->addSelect('ukvd');
            }


            $this->optionCategories();


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


     public function optionCategories()
     {
         $categoty=$this->c_rep->get();
         $mBuilder=Menu::make('MyNav', function ($m) use ($categoty) {
             foreach($categoty as $item)
             {
                 if($item->parent==0)
                 {
                     $m->add($item->title,$item->path)->id($item->id); // в пункт меню присваиваеется title , путь и id
                 }
                 else {
                     if($m->find($item->parent))  // поиск родительского элемента и он существует
                     {
                         $m->find($item->parent)->add($item->title,$item->path)->id($item->id);
                     }

                 }
             }
         });
         $navigation = view(env('THEME') . '.admin.categories.navigation_category')->with('category',$categoty)->render();
         $this->vars = array_add($this->vars, 'navigation', $navigation);  // вывод навигации меню
         return $mBuilder;

     }


}
