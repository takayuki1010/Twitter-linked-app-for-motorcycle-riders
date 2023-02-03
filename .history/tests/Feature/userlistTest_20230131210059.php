<?php
//ユーザーリスト取れてるか
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
        $response = $this->get(route('admin'));

        $response->assertOk();

        $response->assertViewIs('userlist.blade.php');

        $response->assertViewHas(['count' => 5]);

        $response->assertStatus(200);
    }
}
