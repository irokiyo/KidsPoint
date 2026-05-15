<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Child;
use App\Models\Task;
use App\Models\Category;

class TaskRecordTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_task_record_can_be_created(): void
    {
        $user = User::factory()->create();
        $child = Child::create([
            'user_id' => $user->id,
            'name' => '美子',
            'birthday' => '2015-01-01',
            'sex' => '女',
        ]);
        $category = Category::create([
            'name' => '家事',
        ]);
        $task = Task::create([
            'category_id' => $category->id,
            'title' => 'お手伝い',
            'point' => 10,
        ]);
        $response = $this->actingAs($user)->post("/task/record/{$child->id}",[
            'child_id' => $child->id,
            'tasks' => [$task->id],
        ]);
        $response->assertSessionHasNoErrors();
        $response->assertStatus(302);
        $this->assertDatabaseHas('task_records', [
            'child_id' => $child->id,
            'task_id' => $task->id,
        ]);
    }
    public function test_task_record_is_required_when_creating_task_records(): void
    {
        $user = User::factory()->create();
        $category = Category::create([
            'name' => '家事',
        ]);
        $child = Child::create([
            'user_id' => $user->id,
            'name' => '美子',
            'birthday' => '2015-01-01',
            'sex' => '女',
        ]);
        $task = Task::create([
            'category_id' => $category->id,
            'title' => 'お手伝い',
            'point' => 10,
        ]);
        $response = $this->actingAs($user)->post("/task/record/{$child->id}",[
            'tasks' => [],
        ]);
        $response->assertSessionHasErrors('tasks');
    }
}