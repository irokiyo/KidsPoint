<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class RewardTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_reward_can_be_created(): void
    {   $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/reward/store',[
            'name' => 'ご褒美',
            'point' => 50,
        ]);
        $response->assertStatus(302);
        $this->assertDatabaseHas('rewards', [
            'name' => 'ご褒美',
            'point' => 50,
        ]);
    }
    public function test_name_is_required_when_creating_reward(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/reward/store',[
            'name' => '',
            'point' => 50,
        ]);
        $response->assertSessionHasErrors('name');
    }
    public function test_point_is_required_when_creating_reward(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/reward/store',[
            'name' => 'ご褒美',
            'point' => '',
        ]);
        $response->assertSessionHasErrors('point');
    }
}
