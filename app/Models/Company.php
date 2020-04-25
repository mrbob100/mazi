<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $timestamps = false;
    public $table = 'companies';
    protected $fillable=['id','nick','name'];
}
