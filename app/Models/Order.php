<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';
    protected $primaryKey='id';
    protected $fillable =['qty','sum','status','firstname','secondname','email','phone','address','comment'];

    public function order_items()
    {
        return $this->hasMany('Corp\Models\Order_item','order_id','id');
    }


}
