<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Gluelength extends Model
{
    public $timestamps = false;
    public $table = 'gluelengths';
    protected $fillable=['id','nick','name'];
}
