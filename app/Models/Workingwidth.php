<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Workingwidth extends Model
{
    public $timestamps = false;
    public $table = 'workingwidths';
    protected $fillable=['id','nick','name'];
}
