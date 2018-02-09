<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    public $timestamps = false;
    public $table = 'threads';
    protected $fillable=['id','nick','name'];
}
