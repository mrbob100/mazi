<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Voltage extends Model
{
    public $timestamps = false;
    public $table = 'voltages';
    protected $fillable=['id','nick','name'];
}
