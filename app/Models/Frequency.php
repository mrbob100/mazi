<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Frequency extends Model
{
    public $timestamps = false;
    public $table = 'frequencies';
    protected $fillable=['id','nick','name'];
}
