<?php

namespace App\Repositories\Interfaces;

interface TaskRepositoryInterface
{
    public function getAll();

    public function create(array $data);
}