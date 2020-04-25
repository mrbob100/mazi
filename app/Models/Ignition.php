<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Ignition extends Model
{
    public $timestamps = false;
    public $table = 'ignitions';
    protected $fillable=['id','nick','name'];
}
