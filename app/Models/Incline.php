<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Incline extends Model
{
    public $timestamps = false;
    public $table = 'inclines';
    protected $fillable=['id','nick','name'];
}
