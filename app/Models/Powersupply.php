<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Powersupply extends Model
{
    public $timestamps = false;
    public $table = 'powesupplays';
    protected $fillable=['id','nick','name'];
}
