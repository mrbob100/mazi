<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Laserclass extends Model
{
    public $timestamps = false;
    public $table = 'laserclasses';
    protected $fillable=['id','nick','name'];
}
