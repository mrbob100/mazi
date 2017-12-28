<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Diametrdsk extends Model
{
    public $timestamps = false;
    public $table = 'diametrdsks';
    protected $fillable=['id','nick','name'];
}
