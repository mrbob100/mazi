<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Typeaccuracy extends Model
{
    public $timestamps = false;
    public $table = 'typeaccuracies';
    protected $fillable=['id','nick','name'];
}
