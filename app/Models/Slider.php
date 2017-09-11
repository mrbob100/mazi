<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public function product()
    {
        return $this->hasOne('App\Models\Product','id','product_id');
    }
}
