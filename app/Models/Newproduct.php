<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Newproduct extends Model
{

    protected $fillable=['id','name','path','product_id','created_at'];

    public function products()
    {
        return $this->hasOne('Corp\Models\Product','id','product_id');
    }

}
