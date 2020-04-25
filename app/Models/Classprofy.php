<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Classprofy extends Model
{
    public $timestamps = false;
    public $table = 'classprofies';
    protected $fillable=['id','nick','name'];
}
