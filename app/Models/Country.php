<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $timestamps = false;
    public $table = 'countries';
    protected $fillable=['id','nick','name'];
}
