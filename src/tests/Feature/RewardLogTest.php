<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Child;
use App\Models\Reward;

class RewardLogTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_reward_log_can_be_created(): void
    {
        $user = User::factory()->create();
        $child = Child::create([
            'user_id' => $user->id,
            'name' => '美子',
            'birthday' => '2015-01-01',
            'sex' => '女',
        ]);
        $reward = Reward::create([
            'name' => 'ご褒美',
            'point' => 50,
        ]);
        $response = $this->actingAs($user)->post("/reward/log/{$child->id}",[
            'child_id' => $child->id,
            'rewards' => [$reward->id],
            'quantity' => 1,
            'used_point' => 50,
        ]);
        $response->assertStatus(302);
        $this->assertDatabaseHas('reward_logs', [
            'child_id' => $child->id,
            'reward_id' => $reward->id,
            'quantity' => 1,
            'used_point' => 50,
        ]);
    }
    public function test_reward_log_is_required_when_creating_reward_logs(): void
    {
        $user = User::factory()->create();
        $child = Child::create([
            'user_id' => $user->id,
            'name' => '美子',
            'birthday' => '2015-01-01',
            'sex' => '女',
        ]);
        $reward = Reward::create([
            'name' => 'ご褒美',
            'point' => 50,
        ]);
        $response = $this->actingAs($user)->post("/reward/log/{$child->id}",[
            'child_id' => $child->id,
            'rewards' => [],
            'rewarded_at' => now(),
            'quantity' => 1,
            'used_point' => 50,
        ]);
        $response->assertSessionHasErrors('rewards');
    }
}
