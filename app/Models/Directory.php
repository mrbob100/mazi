<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Directory extends Model
{
    protected $fillable=['id','title','patn','parent','created_at','updated_at'];
}
