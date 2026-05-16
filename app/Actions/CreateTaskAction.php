<?php

namespace App\Actions;

use App\Services\TaskService;

class CreateTaskAction
{
    public function execute(array $data)
    {
        return app(TaskService::class)
            ->createTask($data);
    }
}