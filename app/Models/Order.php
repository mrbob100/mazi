<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';
    protected $primaryKey='id';
    protected $fillable =['qty','sum','status','user_id','comment'];

    public function order_items()
    {
        return $this->belongsTo('App\Models\Order_item','order_id','id');
    }

    public function users()
    {
        return $this->belongsTo('App\User','id','user_id');
    }
}
