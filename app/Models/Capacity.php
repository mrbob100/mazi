<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Capacity extends Model
{
    public $timestamps = false;
    public $table = 'capacities';
    protected $fillable=['id','nick','name'];
}
