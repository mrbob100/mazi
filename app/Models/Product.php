<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $table='products';
    protected $primaryKey='id';
    protected $fillable = ['category_id','name','content','price','keywords','description','img','label','hit','new','sale'];
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function categories()
    {
        return  $this->belongsTo('App\Models\Category','id','category_id');
    }
}
