<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Oscillationangle extends Model
{
    public $timestamps = false;
    public $table = 'oscillationangles';
    protected $fillable=['id','nick','name'];
}
