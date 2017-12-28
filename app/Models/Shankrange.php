<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Shankrange extends Model
{
    public $timestamps = false;
    public $table = 'shankranges';
    protected $fillable=['id','nick','name'];
}
