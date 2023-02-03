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
    public function userlist()
    {
        $response = $this->get('/');

        $response->assertStatus(200)
        ->assertViewIs('index');

    }


}
