<?php

namespace Corp\Http\Controllers\Admin;

use Corp\Models\Airflow;
use Corp\Models\Company;
use Corp\Models\Cutdepth;
use Corp\Models\Cutmatdepth;
use Corp\Models\Cutedgewidth;
use Corp\Models\Defence;
use Corp\Models\Frequency;
use Corp\Models\Grouptool;
use Corp\Models\Packing;
use Corp\Models\TypeTool;
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
use Corp\Models\Country;
use Corp\Models\Accumulatortype;
use Corp\Models\Accuracy;
use Corp\Models\Accuracyslope;
use Corp\Models\Android;
use Corp\Models\Angle;
use Corp\Models\Brightness;
use Corp\Models\Calculation;
use Corp\Models\Chargetime;
use Corp\Models\Containervol;
use Corp\Models\Crownlength;
use Corp\Models\Display;
use Corp\Models\Fixture;
use Corp\Models\Functional;
use Corp\Models\Gluediameter;
use Corp\Models\Gluelength;
use Corp\Models\Goaldistance;
use Corp\Models\Holediameter;
use Corp\Models\Ignition;
use Corp\Models\Iphone;
use Corp\Models\Laserclass;
use Corp\Models\Magnificate;
use Corp\Models\Measurange;
use Corp\Models\Measurenumber;
use Corp\Models\Oscillationangle;
use Corp\Models\Powersupply;
use Corp\Models\Screw;
use Corp\Models\Strokeqnt;
use Corp\Models\Temperature;
use Corp\Models\Thread;
use Corp\Models\Turbinpower;
use Corp\Models\Typeaccuracy;
use Corp\Models\Unit;
use Corp\Models\Wheeldiameter;
use Corp\Models\Worktime;




use Corp\Models\Csvload;

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
              'name'=>'required | max:255 ',
             'category_id'=>'required | min:0 | integer',
             'description'=>'required',
             'text'=>'nullable',
             'price'=>'required|numeric | min:0',
             'img'=>'image|nullable',
                 'mini_side'=>'image|nullable',
             'type'=>'digits:1 | nullable ',
            'country'=>'required',
            'groupTools'=>' nullable',
            'new' =>'digits:1 | nullable',
            'weightbrutto' => 'nullable',
             'weightnetto' => 'nullable',
             'width'  =>  'nullable',
              'length' =>  'nullable',
              'height'  =>  'nullable',
              'termGuarantee' =>  'nullable',
              'class' =>  'nullable',
              'company' =>  'nullable',
              'exactlyType1' =>  'nullable',
              'exactlyType2' =>  'nullable',
                'sclad' =>  'nullable',
                 'ukvd' =>  'nullable',
              'keywords'=>'nullable',
              'meta_desc'=>'nullable',

            ]);
               if($validator->fails())
                 {
                     return redirect()->route('productAdd')->withErrors( $validator)->withInput();
                 }
         // загрузка изображений
         $file=false; $qw1=false;
         if($request->hasFile('img'))
         {
             $file=$request->file('img');
             if($file->isValid())
             {
                 $qw= $file->getClientOriginalName(); // вставка реального имени
                 $qw1=explode('.',$qw);

                 // $img = Image::make($file1)->resize(120,75);

                 // move - команда перемещения файла из временного хранилища в постоянное
                 //   $file->move(public_path().'/images',$input['img']);  // записывает в библиотеку public содержимое файла $input['images']
             }
         }

         if($request->hasFile('mini_side'))
         {
             $file1=$request->file('mini_side');
             if($file1->isValid())
             {

                 if (!isset($doblo))
                 {
                     $doblo= new Csvload();
                 }


                 //  $qw1=$input['old_images'];
                 // $input['img']='{"mini":"'.$qw2.'","max":"'.$qw1.'","path":"'.$qw3.'"}';
                 $obj = $doblo->mergeUpImages($qw1[0], $file,  $file1);
                 // $obj= $this->workUpImages( $str2->EAN_code,$workImage);
                 $input['img']=json_encode($obj);

                 // move - команда перемещения файла из временного хранилища в постоянное
                 //   $file->move(public_path().'/images',$input['img']);  // записывает в библиотеку public содержимое файла $input['images']
             }
         }
         else
             {
                 if (!isset($doblo))
                 {
                     $doblo= new Csvload();
                 }


                 $obj = $doblo->workUpImages( $qw1[0], $file);
                 // $obj= $this->workUpImages( $str2->EAN_code,$workImage);
                 $input['img']=json_encode($obj);
             }



                 $product=new Product();
               $product->fill($input);
               if($product->save())
               {
                   return redirect('admin')->with('status','Продукция добавлена');
               }
     }

        $model=DB::table('products')->first();
        $model->category_id=0;
        // загрузка сопутствующих файлов
     $files=Config::get('settings.perforator');
    $capacity=Capacity::all();
    $angleCuttingDepth=Anglecutdepth::all();
     $cuttingDepth=Cutdepth::all();
        $cutmatdepth=Cutmatdepth::all();
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

        $accumulatortype=Accumulatortype::all();
        $accuracy=Accuracy::all();
        $accuracyslope=Accuracyslope::all();
        $android=Android::all();
        $angle=Angle::all();
        $brightness=Brightness::all();
        $calculation=Calculation::all();
        $chargetime=Chargetime::all();
        $containervol=Containervol::all();
        $crownlength=Crownlength::all();
        $display=Display::all();
        $fixture=Fixture::all();
        $functional=Functional::all();
        $gluediameter=Gluediameter::all();
        $gluelength=Gluelength::all();
        $goaldistance=Goaldistance::all();
        $holediameter=Holediameter::all();
        $ignition=Ignition::all();
        $iphone=Iphone::all();
        $laserclass=Laserclass::all();
        $magnificate=Magnificate::all();
        $measurange=Measurange::all();
        $measurenumber=Measurenumber::all();
        $oscillationangle=Oscillationangle::all();
        $powersupply=Powersupply::all();
        $screw=Screw::all();
        $strokeqnt=Strokeqnt::all();
        $temperature=Temperature::all();
        $thread=Thread::all();
        $turbinpower=Turbinpower::all();
        $typeaccuracy=Typeaccuracy::all();
        $unit=Unit::all();
        $wheeldiameter=Wheeldiameter::all();
        $worktime=Worktime::all();



     $typetools=TypeTool::all();
     $countrys=Country::all();
     $grouptools=Grouptool::all();
     $companies=Company::all();
     $packings=Packing::all();

     $listTool=array();
     $countryT=array();
     $groupT=array();
     $companyTo=array();
     $packingTo=array();
     $classTo=array();
        $classTo[1]="профессиональный";
        $classTo[2]="не профессиональный";
         foreach( $typetools as $typetool)
         {
             $listTool[$typetool->id]=$typetool->name;
         }

        foreach( $countrys as $typetool)
        {
            $countryT[$typetool->name]=$typetool->name;
        }

        foreach( $grouptools as $typetool)
        {
            $groupT[$typetool->id]=$typetool->name;
        }

        foreach( $companies as $typetool)
        {
            $companyTo[$typetool->name]=$typetool->name;
        }

        foreach( $packings as $typetool)
        {
            $packingTo[$typetool->name]=$typetool->name;
        }

        if(view()->exists(env('THEME').'.admin.products.product_add'))
        {
            $data=[
                'title' =>'Новая продукция',
                'model' =>  $model,
                'capacity'=>$capacity,
                'angleCuttingDepth'=>$angleCuttingDepth,
                'cuttingDepth'=>$cuttingDepth,
                'cutmatdepth'=>$cutmatdepth,
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
                'workingwidth'=>$workingwidth,

                'accumulatortype'=>$accumulatortype,
                'accuracy'=>$accuracy,
                'accuracyslope'=> $accuracyslope,
                'android'=>$android,
                'angle'=>$angle,
                'brightness'=>$brightness,
                'calculation'=>$calculation,
                'chargetime'=> $chargetime,
                'containervol'=>$containervol,
                'crownlength'=> $crownlength,
                'display'=>$display,
                'fixture'=>$fixture,
                'functional'=>$functional,
                'gluediameter'=> $gluediameter,
                'gluelength'=>$gluelength,
                'goaldistance'=> $goaldistance,
                'holediameter'=> $holediameter,
                'ignition'=>$ignition,
                'iphone'=> $iphone,
                'laserclass'=> $laserclass,
                'magnificate'=>$magnificate,
                'measurange'=> $measurange,
                'measurenumber'=> $measurenumber,
                'oscillationangle'=> $oscillationangle,
                'powersupply'=>$powersupply,
                'screw'=>$screw,
                'strokeqnt'=>$strokeqnt,
                'temperature'=> $temperature,
                'thread'=>$thread,
                'turbinpower'=> $turbinpower,
                'typeaccuracy'=>$typeaccuracy,
                'unit'=> $unit,
                'wheeldiameter'=>$wheeldiameter,
                'worktime'=>$worktime,


                'typetools'=>$typetools,
                'listTool'=>$listTool,
                'countryT'=>$countryT,
                'groupT'=>$groupT,
                'companyTo'=>$companyTo,
                'packingTo'=>$packingTo,
                'classTo'=>$classTo

            ];
            return view(env('THEME').'.admin.products.product_add', $data);
        }
        abort(404);

    }
}
