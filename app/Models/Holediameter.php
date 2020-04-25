<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Holediameter extends Model
{
    public $timestamps = false;
    public $table = 'holediameters';
    protected $fillable=['id','nick','name'];
}
