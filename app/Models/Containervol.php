<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Containervol extends Model
{
    public $timestamps = false;
    public $table = 'containervols';
    protected $fillable=['id','nick','name'];
}
