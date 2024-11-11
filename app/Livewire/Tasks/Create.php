<?php

namespace App\Livewire\Tasks;

use App\Livewire\Forms\TaskForm;
use App\Models\Task;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Create extends Component
{
    public TaskForm $form;

    public function mount(Task $task)
    {
        $this->form->setTaskModel($task);
    }

    public function save()
    {
        $this->form->store();

        return $this->redirectRoute('tasks.index', navigate: true);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.task.create');
    }
}