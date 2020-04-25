<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    public $table = 'role_user';
    protected $fillable =['id','user_id','role_id','created_at','updated_at'];
}
