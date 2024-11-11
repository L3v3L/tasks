<?php

namespace App\Livewire\Forms;

use App\Models\Task;
use Livewire\Form;

class TaskForm extends Form
{
    public ?Task $taskModel;

    public $title;
    public $description;
    public $status;
    public $possibleStatuses = Task::STATUSES;


    public function rules(): array
    {
        $statusIds = array_keys(Task::STATUSES);
        return [
			'title' => 'required|string',
			'description' => 'string|nullable',
            'status' => 'required|int|in:' . implode(',', $statusIds),
        ];
    }

    public function setTaskModel(Task $taskModel): void
    {
        $this->taskModel = $taskModel;

        $this->title = $this->taskModel->title;
        $this->description = $this->taskModel->description;
        $this->status = $this->taskModel->status;
    }

    public function store(): void
    {
        $this->taskModel->create($this->validate());

        $this->reset();
    }

    public function update(): void
    {
        $this->taskModel->update($this->validate());

        $this->reset();
    }
}
