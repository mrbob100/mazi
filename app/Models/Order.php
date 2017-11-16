<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';
    protected $primaryKey='id';
    protected $fillable =['id','qty','sum','status','user_id','comment','created_at','updated_at'];

    public function order_items()
    {
        return $this->hasMany('Corp\Models\Order_item','order_id','id');
    }


}
