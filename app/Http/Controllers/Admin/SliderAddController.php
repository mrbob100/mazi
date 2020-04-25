<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Corp\Models\Slider;
use Corp\Models\Product;
use Validator;
class SliderAddController extends adminSiteController
{
    public function index(Request $request)
    {
        if($request->isMethod('post'))
        {
            $slider=new Slider();
            $input=$request->except('_token');

            //валидация данных
            $validator=Validator::make($input,[
                'name' => 'nullable | max:255|unique:sliders,name ',
                'path' => 'nullable|max:255',
                'img'=>'image|nullable'

            ]);
            if( $validator->fails())
            {
                return redirect()->route('sliderAdd')->withErrors( $validator)->withInput();
            }
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
                        $slider->fill($input);
                        $slider->path=$qw;
                        $slider->product_id=$product_id;
                        $slider->name =  $name;
                    }



                    // $obj= $this->workUpImages( $str2->EAN_code,$workImage);


                    // move - команда перемещения файла из временного хранилища в постоянное
                    //   $file->move(public_path().'/images',$input['img']);  // записывает в библиотеку public содержимое файла $input['images']
                }
            }

            //  $category->unguard(); // снимает ограничения fillable
            // заполнение полей category

            if($slider->save())
            {
                return redirect('admin')->with('status','Позиция слайдера добавлена');
            }
        }


        if(view()->exists(env('THEME').'.admin.handbooks.index'))
        {
            $data=[
                'title' =>'Новая позиция слайдера'
            ];


            $content = view(env('THEME').'.admin.sliders.content_sliderAdd')->with(['data'=>$data])->render();
            $this->vars = array_add($this->vars, 'content', $content);  // вывод навигации меню
            return $this->renderOutput();

        }
        abort(404);
    }
}
