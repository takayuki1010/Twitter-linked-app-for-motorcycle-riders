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
        $response = $this->actingAs('テスト１')->
        get(route('admin'));

        $response->assertOk();

        $response->assertViewIs('userlist.blade.php');

        $response->assertViewHas(['count' => 5]);

        $response->assertSeeText('count: 5');
    }
}
