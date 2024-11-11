<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_list_of_tasks()
    {
        Task::factory(100)->create();
        LiveWire::test('tasks.index')
            ->assertSee('Tasks')
            ->assertSee('Title')
            ->assertSee('Description')
            ->assertSee('Status')
            ->assertSee('Add new')
            ->assertSee('Show')
            ->assertSee('Edit')
            ->assertSee('Delete')
            ->assertViewHas('tasks', function ($tasks) {
                return count($tasks) == 10;
            });
    }

    public function test_create_task()
    {
        Livewire::test('tasks.create')
            ->set('form.title', 'Test Task')
            ->set('form.description', 'Test Description')
            ->set('form.status', 0)
            ->call('save')
            ->assertRedirect(route('tasks.index'));

        $this->assertDatabaseHas('tasks', [
            'title' => 'Test Task',
            'description' => 'Test Description',
            'status' => 0,
        ]);
    }

    public function test_create_task_with_validation_error()
    {
        Livewire::test('tasks.create')
            ->set('form.title', '')
            ->set('form.description', '')
            ->set('form.status', -10)
            ->call('save')
            ->assertHasErrors(['form.title', 'form.status'])
            ->assertHasNoErrors('form.description');
    }
}
