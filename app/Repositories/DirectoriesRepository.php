<?php
namespace Corp\Repositories;
use Corp\Models\Directory;
class DirectoriesRepository extends Repository
{
    public function __construct(Directory $directory)
    {
        $this->model=$directory;
    }
}