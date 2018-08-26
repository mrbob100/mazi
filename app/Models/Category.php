<?php

namespace Corp\Models;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';
   // protected $primaryKey='id';
    public $timestamps = false;
    //  protected $guarded=['name'];  / '*' по умолчанию запрещает запись во все поля
    protected $fillable = ['id','parent_id','name','img','text','number','keywords','description'];
   // protected $guarded=['created_at','updated_at'];
   public function products()
    {
        return $this->hasMany('Corp\Models\Product','category_id','id');
    }

    public function getCategory()
    {
       return $this->hasOne('Corp\Models\Category','id','parent_id');
    }

}
