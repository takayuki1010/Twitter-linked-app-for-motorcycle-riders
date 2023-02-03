<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class indexTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // ログインユーザーがリストにアクセスできる

    // ログインユーザーはメッセージ可能
    // ログインユーザーはコメント可能
    // ログインユーザーは退会可能
    // データの変更が可能

    /**
     * @test
     */
    public function list_access()
    {
        // ログインでアクセス可能
        $user = User::factory()->create();
    
        $response = $this->actingAs($user)->get(route('list.index'));

        $response->assertStatus(200);
    }
    
    public function list_notaccess()
    {
        $user = User::factory()->create();
            // していないユーザーはできない
        $response = $this->actingAs($user)->get(route('message.create'));

        $response->assertStatus(302);
    }

}
