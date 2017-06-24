<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
//use Illuminate\Support\Facades\DB;
use Validator;
use DB;
class CategoryEditController extends Controller
{
    public function index(Category $category, Request $request)
   // public function index(Category $category,Request $request)
    {
        $id=$request->id;
        if($request->isMethod('delete'))
        {
            $category->where('id',$id)->delete();
            return redirect('admin')->with('status','Категория удалена');
        }

        if($request->isMethod('post'))
        {
            $input=$request->except('_token');
            $validator=Validator::make($input,[
                // уникальное поле в таблице categories, поле - которое игнорируется, по какому полю поиск
                'name'=>'required | max:255  |unique:categories,name,'.$input['id'],
                'parent_id'=>'required |min:0',
            ]);
            if( $validator->fails())
            {
                return redirect()->route('categoryEdit',['id'=>$input['id']])->withErrors( $validator)->withInput();
            }
            // если есть изображение
        /*   if($request->hasFile('images'))
           {
             $file=$request->file('images');
             $file->move(public_path().'/assets/img/',getClientOriginalName());
             $input['images']=$file->getClientOriginalName();
           }
           else
               {
                   $input['images']=$input['old_images'];
               }
               unset($input['old_images']);  // удаление ячейки
        */
            $category->fill($input); //заполнение полей

              //  dd($category);
           $cat=DB::table('categories')->where('id',$id)->update($category->toArray());
            if($cat)
            {
                return redirect('admin')->with('status','Категория обновлена');
            }
            else abort(404);
        }


        $old=Category::find($id);
      //  $old=$category->toArray();
      //  dd($old);

if($old->parent_id==0){
    $parent='Самостоятельная категория';
} else {
   $parent= $old->getCategory->name;

}
$model=$old;
        if(view()->exists('admin.category_edit'))
        {
            $data=[
                'title'=>'Редактирование категории -'.$old['name'],
                'data'=>$old,
                'parent'=> $parent,
                'model'=>$model
            ];
            return view('admin.category_edit',$data,['model'=>$model]);
        }
        abort(404);
    }
}
