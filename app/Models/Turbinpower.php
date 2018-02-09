<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Turbinpower extends Model
{
    public $timestamps = false;
    public $table = 'turbinepowers';
    protected $fillable=['id','nick','name'];
}
