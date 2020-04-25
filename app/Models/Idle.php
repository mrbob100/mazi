<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Idle extends Model
{
    public $timestamps = false;
    public $table = 'idles';
    protected $fillable=['id','nick','name'];
}
