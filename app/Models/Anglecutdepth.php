<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Anglecutdepth extends Model
{
    public $timestamps = false;
    public $table = 'anglecutdepths';
    protected $fillable=['id','nick','name'];
}
