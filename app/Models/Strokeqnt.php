<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Strokeqnt extends Model
{
    public $timestamps = false;
    public $table = 'strokeqtns';
    protected $fillable=['id','nick','name'];
}
