<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Detection extends Model
{
    public $timestamps = false;
    public $table = 'detections';
    protected $fillable=['id','nick','name'];
}
