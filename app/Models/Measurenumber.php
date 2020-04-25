<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Measurenumber extends Model
{
    public $timestamps = false;
    public $table = 'measurenumbers';
    protected $fillable=['id','nick','name'];
}
