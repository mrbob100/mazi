<?php
namespace Corp\Repositories;
use Corp\Models\Order;

class OrdersRepository extends Repository
{
    public function __construct(Order $order)
    {
        $this->model=$order;
    }
}