<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    public $timestamps = false;
    public $table = 'fixtures';
    protected $fillable=['id','nick','name'];
}
