<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;

class Excelitem extends Model
{
    protected $fillable=[
       'id','heading','category_id','company','name','code',
        'description', 'price', 'termGuarantee','sclad','linkToGood',
        'linkToPhoto'
    ];
}
