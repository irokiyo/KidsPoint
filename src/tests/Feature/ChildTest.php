<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class ChildTest extends TestCase
{
    use RefreshDatabase;

    public function test_child_can_be_created(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/child/store',[
            'user_id' => $user->id,
            'name' => '美子',
            'birthday' => '2015-01-01',
            'sex' => '女',
        ]);
        $response->assertStatus(302);
        $this->assertDatabaseHas('children', [
            'name' => '美子',
            'user_id' => $user->id,
            'birthday' => '2015-01-01',
            'sex' => '女',
        ]);
    }
    public function test_name_is_required_when_creating_child(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/child/store',[
            'user_id' => $user->id,
            'name' => '',
            'birthday' => '2015-01-01',
            'sex' => '女',
        ]);
        $response->assertSessionHasErrors('name');
    }
    public function test_birthday_is_required_when_creating_child(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/child/store',[
            'user_id' => $user->id,
            'name' => '美子',
            'birthday' => '',
            'sex' => '女',
        ]);
        $response->assertSessionHasErrors('birthday');
    }
    public function test_sex_is_required_when_creating_child(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/child/store',[
            'user_id' => $user->id,
            'name' => '美子',
            'birthday' => '2015-01-01',
            'sex' => '',
        ]);
        $response->assertSessionHasErrors('sex');
    }


}
