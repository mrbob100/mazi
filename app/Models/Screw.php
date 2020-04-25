<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Screw extends Model
{
    public $timestamps = false;
    public $table = 'screws';
    protected $fillable=['id','nick','name'];
}
