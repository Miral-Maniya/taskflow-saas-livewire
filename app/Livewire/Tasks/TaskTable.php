<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;

class TaskTable extends Component
{
    use WithPagination;

    public $search = '';

    public $title;

    public $description;

    public $priority = 'medium';

    public $status = 'pending';

    public $client_id;

    public function save()
    {
        $this->validate([
            'title' => 'required|min:3',
            'client_id' => 'required',
        ]);

        Task::create([
            'title' => $this->title,
            'description' => $this->description,
            'priority' => $this->priority,
            'status' => $this->status,
            'client_id' => $this->client_id,
            'user_id' => auth()->id(),
        ]);

        $this->reset([
            'title',
            'description',
            'priority',
            'status',
            'client_id',
        ]);

        $this->dispatch('task-created');
    }

    public function closeModal()
    {
        $this->resetValidation();

        $this->reset([
            'title',
            'description',
            'client_id',
        ]);

        $this->priority = 'medium';
    }

    public function render()
    {
        return view('livewire.tasks.task-table', [

            'tasks' => Task::query()

                ->where('title', 'like', "%{$this->search}%")

                ->latest()

                ->paginate(10),

            'clients' => Client::all()

        ])->layout('layouts.app');
    }
}