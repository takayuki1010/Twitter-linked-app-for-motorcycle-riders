<?php
// ルート指定できているか
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class userlistTest extends TestCase
{
    /**
     * @test
     */
    public function index()
    {

        $user = factory(User::class)->create();

        $response = $this->get('/');

        $response->assertStatus(200)
        ->assertViewIs('index');

        $response = $this->get(route('login.index'));

        $response->assertStatus(200)
        ->assertViewIs('login');

        $response = $this->actingAs($user)->get(route('logout.index'));

        $response->assertStatus(200)
        ->assertViewIs('logout');

    }

}
