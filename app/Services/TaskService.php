<?php

namespace App\Services;

use App\Jobs\SendTaskNotification;
use App\Repositories\Interfaces\TaskRepositoryInterface;

class TaskService
{
    public function __construct(
        protected TaskRepositoryInterface $taskRepository
    ) {}

    public function createTask(array $data)
    {
        $task = $this->taskRepository
            ->create($data);

        // Dispatch Queue Job
        SendTaskNotification::dispatch($task);

        return $task;
    }

    public function getTasks()
    {
        return $this->taskRepository
            ->getAll();
    }
}