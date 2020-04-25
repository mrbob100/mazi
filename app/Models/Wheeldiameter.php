<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Wheeldiameter extends Model
{
    public $timestamps = false;
    public $table = 'wheeldiameters';
    protected $fillable=['id','nick','name'];
}
