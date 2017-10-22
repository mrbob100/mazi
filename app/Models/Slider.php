<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public function products()
    {
        return $this->hasOne('Corp\Models\Product','id','product_id');
    }
}
