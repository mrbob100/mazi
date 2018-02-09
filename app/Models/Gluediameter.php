<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Gluediameter extends Model
{
    public $timestamps = false;
    public $table = 'gluediameters';
    protected $fillable=['id','nick','name'];
}
