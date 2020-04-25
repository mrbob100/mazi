<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Accuracyslope extends Model
{
    public $timestamps = false;
    public $table = 'accuracyslopes';
    protected $fillable=['id','nick','name'];
}
