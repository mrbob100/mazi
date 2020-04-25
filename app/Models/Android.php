<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Android extends Model
{
    public $timestamps = false;
    public $table = 'androids';
    protected $fillable=['id','nick','name'];
}
