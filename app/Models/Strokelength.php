<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Strokelength extends Model
{
    public $timestamps = false;
    public $table = 'strokelengths';
    protected $fillable=['id','nick','name'];
}
