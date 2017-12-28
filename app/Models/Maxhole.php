<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Maxhole extends Model
{
    public $timestamps = false;
    public $table = 'maxholes';
    protected $fillable=['id','nick','name'];
}
