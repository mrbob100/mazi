<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Spindle extends Model
{
    public $timestamps = false;
    public $table = 'spindles';
    protected $fillable=['id','nick','name'];
}
