<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    protected $table='products';
    protected $primaryKey='id';
    protected $fillable = ['category_id','name','content','price','keywords','description','img','hit','new','sale'];
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return  $this->belongsTo('Category','id','category_id');
    }
}
