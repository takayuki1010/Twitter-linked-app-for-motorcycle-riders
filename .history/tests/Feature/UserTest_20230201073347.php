<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class userTest extends TestCase
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

    public function test_list_access(){

        $this->withoutExceptionHandling();
        $response = $this->get(route('list.index'));
        $response->assertStatus(200);
    }

    public function test_index()
    {
        $response = $this->get(route('index'));

        $response->assertStatus(200);


    }
}
