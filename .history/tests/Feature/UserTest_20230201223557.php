<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use DatabeseMaigration;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Message;
use App\Models\Comment;

use Illuminate\Support\Facades\Artisan;

class userTest extends TestCase
{
    // use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();

        Artisan::call('migrate:fresh --seed');
    }

    
    // ログイン画面を表示する
    // ログイン機能が働いている
    // リストが表示されている　（ログインのみ
    // 詳細画面に入れる（ログインのみ
    // コメントの投稿ができる（ログインのみ
    // メッセージの投稿ができる（ログインのみ
    // ユーザー情報の変更ができる（ログインのみ
    // 退会ができる（ログインのみ
    // Twitterに投稿できる（ログインのみ

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        // トップ画面表示
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_loginview()
    {
        // ログイン画面表示
        $response = $this->get(route('login.index'));

        $response->assertStatus(200);

    }
    public function test_listview(){

        // ログインしていればlistへアクセス可能
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('list.index'));

        // HTTPステータスコード200が返ってきていることを確認します。
        $response->assertOk();

        // 指定のViewを読み込んでいることをテストします。
        $response->assertViewIs('list');

        // 指定の文字列あるか
        $response->assertSeeText('投稿一覧');
    }

    // public function test_detailview()
    // {
    //     // ログインしていればlistへアクセス可能
    //     $user = User::factory()->create();

    //     $response = $this->actingAs($user)->get('detail/{$user->id}');

    //     // HTTPステータスコード200が返ってきていることを確認します。
    //     $response->assertOk();

    //     // 指定のViewを読み込んでいることをテストします。
    //     $response->assertViewIs('detail');

    //     // 指定の文字列あるか
    //     $response->assertSeeText('投稿詳細');

    // }

    public function test_userlist()
    {
        // ログインしていればlistへアクセス可能
        $user = User::factory()->create(['role' => 5]);

        $response = $this->actingAs($user)->get('/admin');

        $response->assertOk();

        $response->assertViewIs('userlist');

        $response->assertSeeText('現在のユーザー数：');
    }

    public function test_logoutview()
    {
                // ログインしていればlistへアクセス可能
                $user = User::factory()->create();

                $response = $this->actingAs($user)->get(route('logout.index'));
        
                $response->assertOk();
        
    }
}
