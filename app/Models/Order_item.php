<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    protected $table='order_items';
    protected $primaryKey='id';
    protected $fillable =['order_id','product_id','name','price','qty_item','sum_item','priznak'];

    public function products()
    {
        return $this->hasMany('Corp\Models\Product','id','product_id');
    }

    public function orders()
    {
        return $this->belongsTo('Corp\Models\Order','order_id','id');
    }
}
