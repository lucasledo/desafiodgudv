<?php

namespace Tests\Feature\Task;

use App\Models\User;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    public function test_task_list_screen_can_ben_rendered(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $response = $this->get('/tasks');

        $response->assertStatus(200);
    }

    public function test_create_new_task(): void
    {
        $user = User::latest()->first();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $response = $this->post('/tasks', [
            'title'         => 'New Task',
            'description'   => 'Description Task'
        ]);

        $response->assertSee('New Task');
    }

    public function test_update_task(): void
    {
        $user = User::latest()->first();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $task = Task::latest()->first();

        $response = $this->patch(route('tasks.update', $task->id), [
            'title'         => 'Update Task',
            'description'   => 'Update Description Task'
        ]);

        $response->assertSee('Update Task');
    }

    public function test_delete_task():void
    {
        $user = User::latest()->first();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $task = Task::latest()->first();

        $response = $this->delete(route('tasks.destroy', $task->id));

        $response->assertExactJson($task->toArray());

        $user->delete();
    }
}
