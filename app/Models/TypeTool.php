<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class TypeTool extends Model
{
    public $table='typeTools';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=['id','nick','name'];
    public function products()
    {
        return $this->hasMany('Corp\Models\Product','type','id');
    }
}
