<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Measurange extends Model
{
    public $timestamps = false;
    public $table = 'measureranges';
    protected $fillable=['id','nick','name'];
}
