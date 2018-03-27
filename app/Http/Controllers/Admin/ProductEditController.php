<?php

namespace Corp\Http\Controllers\Admin;


use Corp\Models\Accumulatortype;
use Corp\Models\Accuracy;
use Corp\Models\Accuracyslope;
use Corp\Models\Airflow;
use Corp\Models\Android;
use Corp\Models\Angle;
use Corp\Models\Brightness;
use Corp\Models\Calculation;
use Corp\Models\Chargetime;
use Corp\Models\Company;
use Corp\Models\Containervol;
use Corp\Models\Crownlength;
use Corp\Models\Cutdepth;
use Corp\Models\Cutmatdepth;
use Corp\Models\Cutedgewidth;
use Corp\Models\Defence;
use Corp\Models\Display;
use Corp\Models\Fixture;
use Corp\Models\Frequency;
use Corp\Models\Functional;
use Corp\Models\Gluediameter;
use Corp\Models\Gluelength;
use Corp\Models\Goaldistance;
use Corp\Models\Grouptool;
use Corp\Models\Holediameter;
use Corp\Models\Ignition;
use Corp\Models\Iphone;
use Corp\Models\Laserclass;
use Corp\Models\Magnificate;
use Corp\Models\Measurange;
use Corp\Models\Measurenumber;
use Corp\Models\Oscillationangle;
use Corp\Models\Packing;
use Corp\Models\Powersupply;
use Corp\Models\Screw;
use Corp\Models\Strokeqnt;
use Corp\Models\Temperature;
use Corp\Models\Thread;
use Corp\Models\Turbinpower;
use Corp\Models\Typeaccuracy;
use Corp\Models\TypeTool;
use Corp\Models\Unit;
use Corp\Models\Wheeldiameter;
use Corp\Models\Worktime;
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
use Corp\Models\Classprofy;

use Illuminate\Support\Facades\Storage;
use Corp\Models\Csvload;
use Image;
use Validator;
use Config;
use DB;

class ProductEditController extends Controller
{
    public function index( Request $request,Product $product)
    {
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
        $cutmatdepth=Cutmatdepth::all();
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
        $classprofies=Classprofy::all();

        $listTool=array();
        $countryT=array();
        $groupT=array();
        $companyTo=array();
        $packingTo=array();
        $classTo=array();

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

        foreach( $classprofies as $typetool)
        {
            $classTo[$typetool->name]=$typetool->name;
        }


        $id=$request->id;

        if($request->isMethod('delete'))
        {
            Product::where('id',$id)->delete();
            return redirect('admin')->with('status','Продукт удален');
        }

        if($request->isMethod('post'))
        {
            $input=$request->except('_token');

            $validator=Validator::make($input,[
                // уникальное поле в таблице categories, поле - которое игнорируется, по какому полю поиск
                'name'=>'required | max:255|unique:products,name, '.$input['id'],
                'category_id'=>'required | min:0 | integer',
                'description'=>'required',
                'text'=>'nullable',
                'price'=>'required|numeric | min:0',
                'pricedealer1'=>'required|numeric | min:0',
                'pricedealer2'=>'required|numeric | min:0',
                'img'=>'image|nullable',
                'type'=>'digits:1 | nullable ',
                'country'=>'required',
                'groupTools'=>'nullable',
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

            if( $validator->fails())
            {
                return redirect()->route('productEdit',['id'=>$input['id']])->withErrors( $validator)->withInput();
            }
//_________________________________________________________________________________________________________________
            // если есть основное изображение



            if($request->hasFile('img'))
            {
                $file=$request->file('img');
                if($file->isValid())
                {
                    $qw= $file->getClientOriginalName(); // вставка реального имени
                    $qw1=explode('.',$qw);
                    if (!isset($doblo))
                    {
                        $doblo= new Csvload();
                    }


                       $obj = $doblo->workUpImages(  $qw1[0], $file);
                    // $obj= $this->workUpImages( $str2->EAN_code,$workImage);
                    $input['img']=json_encode($obj);

                    // move - команда перемещения файла из временного хранилища в постоянное
                    //   $file->move(public_path().'/images',$input['img']);  // записывает в библиотеку public содержимое файла $input['images']
                }
            }

               else
                   {
                       $qw1=explode('_',$input['old_images']);
                     //  $feet=public_path() .'/public/'.env('THEME').'/images/'.$input['old_images'];
                     //  $file1 =file_get_contents('/public/'.env('THEME').'/images/'. $input['old_images']);
                    //   $img = Image::make($file1)->resize(120,75);

                       $sa=strval($qw1[2]);
                       $as=explode('.',$sa);

                       $qw2=$qw1[0]."_mini.".$as[1];
                       $qw3=$qw1[0]."_path.".$as[1];
                       $qw1=$input['old_images'];
                       $input['img']='{"mini":"'.$qw2.'","max":"'.$qw1.'","path":"'.$qw3.'"}';
                     //  $input['img']=json_encode($obj);

                   }
                   unset($input['old_images']);  // удаление ячейки



            $product->fill($input);
            $product['category_id'] = $input['category_id'];
            array_key_exists('hit',$input) ?  $product['hit']=1 : $product['hit']=0;
            array_key_exists('new',$input) ?  $product['new']=1: $product['new']=0;
            array_key_exists('sale',$input) ?  $product['sale']=1 : $product['sale']=0;

           $prod=DB::table('products')->where('id',$id)->update($product->toArray());

          // $prod=Product::where('id',$id)->update($product->toArray());
            if($prod)
            {
                return redirect('admin')->with('status','Продукция обновлена');
            }
           // else abort(404);
          else  return redirect('admin')->with('status','Продукция не обновлена, нет изменений');
        } // конец метода post

        $old=Product::find($id);
        $model=$old;
        //$old=$sold->toArray();
       // dd($old);
       // $category= $old->getCategory->name;
        $sas =json_decode($old->img);
        $pic=$sas->max;
        if(view()->exists(env('THEME').'.admin.products.product_edit'))
        {
            $data=[
                'title' =>'Новая продукция',
                'data'=>$old,
                'model'=>$old,
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
                'classTo'=>$classTo,
                'old'=>$old,
                'pic'=>$pic

            ];

//dd($data);
            return view(env('THEME').'.admin.products.product_edit',$data,['old'=>$old, 'model'=>$old]);
        }
        abort(404);
    }
}
