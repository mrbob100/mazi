<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class TypeTool extends Model
{
    protected $table='typeTools';
    protected $primaryKey='id';
    public $timestamps = false;
    public function products()
    {
        return $this->hasMany('Corp\Models\Product','type','id');
    }
}
