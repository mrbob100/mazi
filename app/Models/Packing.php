<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Packing extends Model
{
    public $timestamps = false;
    public $table = 'packings';
    protected $fillable=['id','nick','name'];
}
