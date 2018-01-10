<?php

namespace Corp\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $table='products';
    protected $primaryKey='id';
    protected $fillable = ['id','category_id','code','name','description','text','price','img','type','country','groupTools','new','hit','sale','weightbrutto','sclad','ukvd',
        'weightnetto','width','length','height','termGuarantee','class','packing','company','created_at','updated_at','exactlyType1','exactlyType2','keywords','meta_desc'];
    public function user(){
        return $this->belongsTo('Corp\User');
    }

    public function categories()
    {
        return  $this->belongsTo('Corp\Models\Category','category_id','id');
    }

    public function order_items()
    {
        return $this->belongsTo('Corp\Models\Order_item','product_id','id');
    }

    public function typeTools()
    {
        return $this->belongsTo('Corp\Models\TypeTool','type','id');
    }

    public function sliders()
    {
        return $this->belongsTo('Corp\Models\Slider','id','product_id');
    }
}
