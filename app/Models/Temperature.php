<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Temperature extends Model
{
    public $timestamps = false;
    public $table = 'temperatures';
    protected $fillable=['id','nick','name'];
}
