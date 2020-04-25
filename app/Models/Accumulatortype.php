<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Accumulatortype extends Model
{
    public $timestamps = false;
    public $table = 'accumulatortypes';
    protected $fillable=['id','nick','name'];
}
