<?php

namespace Corp\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Corp\Http\Controllers\Controller;
use Session;
use Validator;
class HandbookEditController extends AdminSiteController
{
    public function index( Request $request)
        // public function index(Category $category,Request $request)
    {
        $id=$request->id;
        $books= Session::get('books');

        $singlebook=$books[0]['name1'];
        $prim=get_class( $singlebook);
        $book=new  $prim();
        $table= $book->table;


        if($request->isMethod('delete'))
        {
            $book->where('id',$id)->delete();
            return redirect('admin')->with('status','Категория удалена');
        }

        if($request->isMethod('post'))
        {
            $input=$request->except('_token');

            $validator=Validator::make($input,[
                // уникальное поле в таблице categories, поле - которое игнорируется, по какому полю поиск
                'nick'=>'required |max:50',
                'name' => 'required|unique:'.$table.'| max:255'


            ]);
            Session::pull('books');

            if( $validator->fails())
            {
                return redirect()->route('handbooksEdit',['id'=>$input['id']])->withErrors( $validator)->withInput();
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


            $book->fill($input); //заполнение полей category значениями $input
            $cat=$book->where('id',$id)->update($book->toArray());

            if($cat)
            {
                return redirect('admin')->with('status','Справочник откорректирован');
            }
            else abort(404);
        }


        $old=$book::find($id);
        //  $old=$category->toArray();
        //  dd($old);
        $name=$old['name'];
        $nick=$old['nick'];

//$model=$old;
        if(view()->exists(env('THEME').'.admin.categories.category_edit'))
        {
            $data=[
                'title'=>'Редактирование категории -'.$old['name'],
                'data'=>$old,
                'id'=>$id,
                'name'=>$name,
                'nick'=>$nick
            ];
            $content = view(env('THEME').'.admin.handbooks.content_handbookEdit')->with(['books'=> $books,'data'=>$data])->render();
            $this->vars = array_add($this->vars, 'content', $content);  // вывод навигации меню
            return $this->renderOutput();
        }
        abort(404);
    }
}
