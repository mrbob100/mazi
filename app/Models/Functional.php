<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Functional extends Model
{
    public $timestamps = false;
    public $table = 'functionals';
    protected $fillable=['id','nick','name'];
}
