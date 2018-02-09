<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Chargetime extends Model
{
    public $timestamps = false;
    public $table = 'chargetimes';
    protected $fillable=['id','nick','name'];
}
