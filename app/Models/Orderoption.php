<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Orderoption extends Model
{
    public $timestamps = false;
    public $table = 'orderoptions';
    protected $fillable=['id','nick','name'];
}
