<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
    // していないユーザーはできない
    // ログインユーザーはメッセージ可能
    // ログインユーザーはコメント可能
    // ログインユーザーは退会可能
    // データの変更が可能

    /**
     * @test
     */
    public function list_access()
    {
        $response = $this->get(route('list.index'));

        $response->assertStatus(200);
    }

}
