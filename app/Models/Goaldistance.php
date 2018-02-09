<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Goaldistance extends Model
{
    public $timestamps = false;
    public $table = 'goaldistances';
    protected $fillable=['id','nick','name'];
}
