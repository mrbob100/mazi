<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public $timestamps = false;
    public $table = 'units';
    protected $fillable=['id','nick','name'];
}
