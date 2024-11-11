<?php

namespace App\Livewire\Tasks;

use App\Livewire\Forms\TaskForm;
use App\Models\Task;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Edit extends Component
{
    public TaskForm $form;

    public function mount(Task $task)
    {
        $this->form->setTaskModel($task);
    }

    public function save()
    {
        $this->form->update();

        return $this->redirectRoute('tasks.index', navigate: true);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.task.edit');
    }
}
