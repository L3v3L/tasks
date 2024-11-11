<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Layout('layouts.app')]
    public function render(): View
    {
        $tasks = Task::paginate();

        return view('livewire.task.index', compact('tasks'))
            ->with('i', $this->getPage() * $tasks->perPage());
    }

    public function delete(Task $task)
    {
        $task->delete();

        return $this->redirectRoute('tasks.index', navigate: true);
    }
}
