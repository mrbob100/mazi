<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Brightness extends Model
{
    public $timestamps = false;
    public $table = 'brightnesses';
    protected $fillable=['id','nick','name'];
}
