<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';
    protected $primaryKey='id';
    //  protected $guarded=['name'];  / '*' по умолчанию запрещает запись во все поля
    protected $fillable = ['parent_id','name','keywords','description'];
   // protected $guarded=['*'];
   public function products()
    {
        return $this->hasMany('App\Models\Product','category_id','id');
    }
}
