<?php

namespace Corp;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable=['id','firstname','lastname','email'];
}
