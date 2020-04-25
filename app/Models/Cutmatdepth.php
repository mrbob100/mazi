<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Cutmatdepth extends Model
{
    public $timestamps = false;
    public $table = 'cutmatdepths';
    protected $fillable=['id','nick','name'];
}
