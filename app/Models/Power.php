<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Power extends Model
{
    public $timestamps = false;
    public $table = 'powers';
    protected $fillable=['id','nick','name'];
}
