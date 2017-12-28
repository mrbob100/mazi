<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Grouptool extends Model
{
    public $timestamps = false;
    public $table = 'groupTools';
    protected $fillable=['id','nick','name'];
}
