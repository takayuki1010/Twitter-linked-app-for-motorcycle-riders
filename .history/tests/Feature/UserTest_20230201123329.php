<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use DatabeseMaigration;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;

class userTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Artisan::call('migrate:fresh --seed');
    }


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

        $user = User::factory()->create();

        $this->withoutExceptionHandling();
        $response = $this->actingAs($user)->get(route('list.index'));
        $response->assertStatus(200);
    }

    public function test_index()
    {
        $response = $this->get(route('index'));

        $response->assertStatus(200);


    }
}