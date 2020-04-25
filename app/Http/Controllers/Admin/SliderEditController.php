<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Corp\Repositories\SlidersRepository;
use Corp\Models\Slider;
use Corp\Models\Product;
use Validator;

class SliderEditController extends adminSiteController
{
    public function __construct(SlidersRepository $s_rep)
    {
        parent::__construct(new \Corp\Repositories\DirectoriesRepository(new \Corp\Models\Directory));
        $this->user_rep=$s_rep; // slider
        // $this->p_rep=$p_rep;  // portfolio
        //   $this->bar='left'; // устанавливает сайт бар значения: left, right, no
        $this->template=env('THEME').'.admin.handbooks.index';
    }


    public function index($id=0)
    {
        $request=Request::createFromGlobals();
        $input = $request->except('_token');



        if($request->isMethod('delete'))
        {

        Slider::where('id',$id)->delete();
        return redirect('admin')->with('status','Запись слайдера удалена');
        }

            if ($request->isMethod('post'))
             {
                $validator = Validator::make($input, [
                    // уникальное поле в таблице categories, поле - которое игнорируется, по какому полю поиск
                    'name' => 'required | max:255|unique:sliders,name, ' . $input['id'],
                    'path' => 'required|max:255',
                    'img'=>'image|nullable'

                ]);

                if ($validator->fails()) {
                    return redirect()->route('sliderEdit', ['id' => $input['id']])->withErrors($validator)->withInput();
                }
                $slider = Slider::where('id', $id)->first();
                $slider->name = $input['name'];
                $slider->path = $input['path'];
                 if($request->hasFile('img'))
                 {
                     $file=$request->file('img');
                     if($file->isValid())
                     {
                         $qw= $file->getClientOriginalName(); // вставка реального имени
                      //   $qw1=explode('.',$qw);
                         $query=Product::select('id','name','img');
                         $product_id=0;
                         $name='';
                         if($qw)
                         {
                             $products=$query->get();
                             foreach($products as $product)
                             {

                                $vibor=json_decode($product->img);
                                if($vibor->path==$qw)
                                {
                                    $product_id=$product->id;
                                    $name=$product->name;
                                    break;
                                }
                             }

                             $slider->path=$qw;
                             $slider->product_id=$product_id;
                             $slider->name =  $name;
                         }



                         // $obj= $this->workUpImages( $str2->EAN_code,$workImage);


                         // move - команда перемещения файла из временного хранилища в постоянное
                         //   $file->move(public_path().'/images',$input['img']);  // записывает в библиотеку public содержимое файла $input['images']
                     }
                 }


                 unset($input['old_images']);  // удаление ячейки

               // $slider = DB::table('sliders')->where('id', $id)->update($slider->toArray());
                 $slider = Slider::where('id', $id)->update($slider->toArray());
                // $prod=Product::where('id',$id)->update($product->toArray());
                if ($slider) {
                    return redirect('admin')->with('status', 'Информация обновлена');
                } // else abort(404);
                else  return redirect('admin')->with('status', 'Информация не обновлена, нет изменений');

             }
        if(view()->exists(env('THEME').'.admin.handbooks.index'))
        {


            $sumUser=array();
            $sliders= Slider::where('id',$id)->first();
            $data=[
                'title'=>'Таблица слайдера',
                'name'=>$sliders->name,
                'path'=>$sliders->path,
                'product_id'=>$sliders->product_id
                  ];


            //    $users=$this->getUsers();

            //   $sas=$users->roles()->where('id',3);


            $content = view(env('THEME').'.admin.sliders.content_sliderEdit')->with(['sliders'=> $sliders,'data'=>$data])->render();
            $this->vars = array_add($this->vars, 'content', $content);  // вывод навигации меню
            return $this->renderOutput();

        }
        abort(404);



    }
}
