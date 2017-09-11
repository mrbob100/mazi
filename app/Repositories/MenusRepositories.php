<?php
namespace Corp\Repositories;
use Corp\Models\Menu;
class MenusRepositories extends Repository
{
  public function __construct(Menu $menu)
  {
    $this->model=$menu;
  }
}