<?php
// ルート指定できているか
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class userlistTest extends TestCase
{
    /**
     * @test
     */
    public function index()
    {
        $response = $this->get('/');

        $response->assertStatus(200)
        ->assertViewIs('index');

        $response = $this->get(route('login.index'));

        $response->assertStatus(200)
        ->assertViewIs('login');

        $response = $this->get(route('list.index'));

        $response->assertStatus(200)
        ->assertViewIs('list');

    }

}
