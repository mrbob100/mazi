<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Airflow extends Model
{
    public $timestamps = false;
    public $table = 'airflows';
    protected $fillable=['id','nick','name'];
}
