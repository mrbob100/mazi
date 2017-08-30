<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $table='products';
    protected $primaryKey='id';
    protected $fillable = ['id','category_id','name','content','price','keywords','description','img','label','hit','new','sale','mini_side','mini_back'];
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function getCategory()
    {
        return  $this->belongsTo('App\Models\Category','category_id','id');
    }

    public function order_items()
    {
        return $this->belongsTo('App\Models\Order_item','product_id','id');
    }
}
