<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Iphone extends Model
{
    public $timestamps = false;
    public $table = 'iphones';
    protected $fillable=['id','nick','name'];
}
