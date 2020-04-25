<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Cartridge extends Model
{
    public $timestamps = false;
    public $table = 'cartridges';
    protected $fillable=['id','nick','name'];
}
