<?php
namespace Corp\Repositories;

use Config;
abstract class Repository
{
 protected $model=false;

 public function get($select='*', $take=false, $pagination=false, $where=false, $priznakSort=0)
 {
     $builder=$this->model->select($select);

     if($take) $builder->take($take);
     if($where) $builder->where($where[0],$where[1]);
     if($pagination) return $this->check($builder->paginate(Config::get('settings.paginate')));
 if($priznakSort==1)
 {
     return $this->check($builder->orderBy('price','asc')->get());
 }
     if($priznakSort==2)
     {
         return $this->check($builder->orderBy('price','desc')->get());
     }
     return $this->check($builder->get());
 }

 protected function check($result)
 {
    if($result->isEmpty()) return false;
    $result->transform(function ($item, $key){
        if(is_string($item->img) && is_object(json_decode($item->img))&& json_last_error()==JSON_ERROR_NONE)
        {   $item->img=json_decode($item->img); }

        if(is_string($item->exactlyType1) && is_object(json_decode($item->exactlyType1))&& json_last_error()==JSON_ERROR_NONE)
        {   $item->exactlyType1=json_decode($item->exactlyType1); }
    return $item;
    });
    return $result;
 }

 public function one($alias,$attr=array())
 {
  $result=$this->model->where('alias',$alias)->first();
  return $result;
 }

}