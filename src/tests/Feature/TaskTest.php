<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;
use App\Models\User;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_task_can_be_created(): void
    {
        $user = User::factory()->create();
        $category = Category::create([
            'name' => '家事',
        ]);
        $response = $this->actingAs($user)->post('/task/store',[
            'category_id' => $category->id,
            'title' => 'お手伝い',
            'point' => 10,
        ]);
        $response->assertStatus(302);
        $this->assertDatabaseHas('tasks', [
            'title' => 'お手伝い',
            'point' => 10,
            'category_id' => $category->id,
        ]);
    }
    public function test_title_is_required_when_creating_task(): void
    {
        $user = User::factory()->create();
        $category = Category::create([
            'name' => '家事',
        ]);
        $response = $this->actingAs($user)->post('/task/store',[
            'category_id' => $category->id,
            'title' => '',
            'point' => 10,
        ]);
        $response->assertSessionHasErrors('title');
    }
    public function test_point_is_required_when_creating_task(): void
    {
        $user = User::factory()->create();
        $category = Category::create([
            'name' => '家事',
        ]);
        $response = $this->actingAs($user)->post('/task/store',[
            'category_id' => $category->id,
            'title' => 'お手伝い',
            'point' => '',
        ]);
        $response->assertSessionHasErrors('point');
    }
}
