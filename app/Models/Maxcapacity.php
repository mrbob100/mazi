<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Maxcapacity extends Model
{
    public $timestamps = false;
    public $table = 'maxcapacities';
    protected $fillable=['id','nick','name'];
}
