<?php

namespace Corp\Http\Controllers\Admin;

use Corp\Models\Airflow;
use Corp\Models\Cutdepth;
use Corp\Models\Cutedgewidth;
use Corp\Models\Defence;
use Corp\Models\Frequency;
use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Corp\Models\Product;
use Corp\Models\Category;
use Corp\Models\Anglecutdepth;
use Corp\Models\Capacity;
use Corp\Models\Diametrdsk;
use Corp\Models\Idle;
use Corp\Models\Impact;
use Corp\Models\MaxHole;
use Corp\Models\Performance;
use Corp\Models\Power;
use Corp\Models\Qntimpact;
use Corp\Models\Rotationspeed;
use Corp\Models\Spindle;
use Corp\Models\Voltage;
use Corp\Models\Cartridge;
use Corp\Models\Grindingplate;
use Corp\Models\Holestand;
use Corp\Models\Maxcapacity;
use Corp\Models\Scaffold;
use Corp\Models\Shankrange;
use Corp\Models\Steel;
use Corp\Models\Strokelength;
use Corp\Models\Vibration;
use Corp\Models\Workingwidth;

use Validator;
use Config;
use DB;
class ProductAddController extends Controller
{
    public function index(Request $request)
    {
     if($request->isMethod('post'))
     {
         $input=$request->except('_token');
         $validator=Validator::make($input,
             [
             'name'=>'required | max:255 '.$input['id'],
             'category_id'=>'required | min:0 | integer',
             'content'=>'required',
             'price'=>'required|numeric | min:0',
             'keywords'=>'nullable',
             'description'=>'nullable',
             'img'=>'image|nullable',
             'mini'=>'image|nullable',
             'hit'=>'boolean',
             'new'=>'boolean',
             'sale'=>'boolean'
            ]);
               if($validator->fails())
                 {
                     return redirect()->route('productAdd')->withErrors( $validator)->withInput();
                 }
         // загрузка изображений
          if($request->hasFile('img'))
          {
           $file=$request->file('img');
           $input['img']= $file->getClientOriginalName(); // вставка реального имени
         // move - команда перемещения файла из временного хранилища в постоянное
            $file->move(public_path().'/images',$input['img']);  // записывает в библиотеку public содержимое файла $input['images']
          }


                 $product=new Product();
               $product->fill($input);
               if($product->save())
               {
                   return redirect('admin')->with('status','Продукция добавлена');
               }
     }

        $model=DB::table('products')->first();

        // загрузка сопутствующих файлов
     $files=Config::get('settings.perforator');
    $capacity=Capacity::all();
    $angleCuttingDepth=Anglecutdepth::all();
     $cuttingDepth=Cutdepth::all();
     $diametrDisk=Diametrdsk::all();
     $idle=Idle::all();
     $impact=Impact::all();
     $maxHole=MaxHole::all();
     $performance=Performance::all();
     $power=Power::all();
     $qntImpact=Qntimpact::all();
     $rotationSpeed=Rotationspeed::all();
     $spindle=Spindle::all();
     $voltage=Voltage::all();
     $cartridge=Cartridge::all();
     $airflow=Airflow::all();
     $cutEdgeWidth=Cutedgewidth::all();
     $defence=Defence::all();
     $frequency=Frequency::all();
     $grindplate=Grindingplate::all();
     $holestand=Holestand::all();
     $maxcapacity=Maxcapacity::all();
     $scaffold=Scaffold::all();
     $shankrange=Shankrange::all();
     $steel=Steel::all();
     $strokelength=Strokelength::all();
     $vibration=Vibration::all();
     $workingwidth=Workingwidth::all();

        if(view()->exists(env('THEME').'.admin.products.product_add'))
        {
            $data=[
                'title' =>'Новая продукция',
                'model' =>  $model,
                'capacity'=>$capacity,
                'angleCuttingDepth'=>$angleCuttingDepth,
                'cuttingDepth'=>$cuttingDepth,
                'diametrDisk'=>$diametrDisk,
                'idle'=>$idle,
                'impact'=>$impact,
                'maxHole'=>$maxHole,
                'performance'=>$performance,
                'power'=>$power,
                'qntImpact'=>$qntImpact,
                'rotationSpeed'=>$rotationSpeed,
                'spindle'=>$spindle,
                'voltage'=>$voltage,
                'cartridge'=>$cartridge,

                'airflow'=>$airflow,
                'cutEdgeWidth'=>$cutEdgeWidth,
                'defence'=>$defence,
                'frequency'=> $frequency,
                'grindplate'=>$grindplate,
                'holestand'=>$holestand,
                'maxcapacity'=>$maxcapacity,
                'scaffold'=>$scaffold,
                'shankrange'=>$shankrange,
                'steel'=>$steel,
                'strokelength'=>$strokelength,
                'vibration'=>$vibration,
                'workingwidth'=>$workingwidth

            ];
            return view(env('THEME').'.admin.products.product_add', $data);
        }
        abort(404);

    }
}
