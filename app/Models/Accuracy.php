<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Accuracy extends Model
{
    public $timestamps = false;
    public $table = 'accuracies';
    protected $fillable=['id','nick','name'];
}
