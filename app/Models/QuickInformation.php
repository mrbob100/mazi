<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class QuickInformation extends Model
{
    public $timestamps = false;
    public $table = 'quickInformations';
    protected $fillable=['id','name','phone','url','created_at','updated_at'];
}
