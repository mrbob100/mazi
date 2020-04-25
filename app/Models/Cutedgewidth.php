<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Cutedgewidth extends Model
{
    public $timestamps = false;
    public $table = 'cutedgewidths';
    protected $fillable=['id','nick','name'];
}
