<?php

namespace App\Livewire\Tasks;

use App\Livewire\Forms\TaskForm;
use App\Models\Task;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    public TaskForm $form;

    public function mount(Task $task)
    {
        $this->form->setTaskModel($task);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.task.show', ['task' => $this->form->taskModel]);
    }
}
