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

        // $this->user = User::factory()->create();

        // $this->message = Message::factory()->create(['user_id' => $this->user->id]);

        // $this->comment = Comment::factory()->create(['user_id' => $this->user->id, 'message_id' => $this->message->id]);

        Artisan::call('migrate:fresh --seed');
    }

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

    public function test_detailview()
    {
        // ログインしていればlistへアクセス可能
        $user = User::factory()->create();

        $message = Message::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->get('detail/{detail}');

        // HTTPステータスコード200が返ってきていることを確認します。
        $response->assertOk();

        // 指定のViewを読み込んでいることをテストします。
        // $response->assertViewIs('detail');

        // 指定の文字列あるか
        // $response->assertSeeText('投稿詳細');

    }

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

        $response->assertStatus(302);
    }

    public function test_register()
    {
        $response = $this->get(route('register.index'));

        $response->assertOk();
    }

    public function test_registercomp()
    {
        $response = $this->post(route('regicomp.store'));

        $response->assertStatus(302);
    }

    public function test_userChange()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('change/{$user->id}/edit');

        $response->assertOk();

        $response->assertViewIs('UserChange');

        $response->assertSeeText('登録情報変更画面');
    }

    public function test_userChangecomp()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->PATCH('change/{$user->id}');

        $response->assertStatus(302);
    }

    public function test_delete()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('delete.index'));

        $response->assertOk();

        $response->assertViewIs('withdrawal');

        $response->assertSeeText('退会情報入力画面');
    }

    public function test_deletecomp()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->DELETE('delete/{$user->id}');

        $response->assertStatus(302);
    }

    public function test_message()
    {
   // 認証ユーザーにして、作成ページに行ける事
    $user = User::factory()->create();
    $response = $this->actingAs($user)->get(route('message.create'));
    $response->assertStatus(200);
    $response->assertViewIs('post');

    $message = [
        'PostText' => 'テスト',
        'postimg1' => 'images/20200501_noimage.jpg',
        'postimg2' => 'images/20200501_noimage.jpg'
    ];

    $url = route('message.store');
    $response = $this->post($url, $message);

    $response->assertSessionHasNoErrors();
    
    $response->assertStatus(302); // リダイレクト

//     $response->assertRedirect('/'); 

//    // 保存したitemがデータベースに存在するか確認。
//     $this->assertDatabaseHas('Messages', ['message' => 'テスト']);

//     $response = $this->get(route('list.index'));
    
//     $response->assertStatus(200);

//     $response->assertSeeText('一覧');

//    // 一覧ページに移動
//     $response = $this->get(route('list.index'));

//     $response->assertStatus(200);

//     $response->assertViewIs('list.index');

//    // 先ほど投稿したitemのtitleと一致するものが表示されているか
//     $response->assertSeeText($massage['テスト']);

    }

    public function test_messagepost()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->PUT('message/{$user->id}');

        $response->assertStatus(200);

    }

    // public function test_comment()
    // {
    //     $user = User::factory()->create();

    //     $message = Message::factory()->create(['user_id' => $user->id]);

    //     $response = $this->actingAs($user)->get('/commentindex/{$message->id}');

    //     $response->assertStatus(200);
    // }

    public function test_password_reset()
    {
        $response = $this->get(route('password_reset.email.form'));

        $response->assertViewIs('reset');

        $response->assertSeeText('パスワード再設定メール送信フォーム');

        $response->assertStatus(200);
    }

    public function test_password_reset2()
    {
        $response = $this->post(route('password_reset.email.send'));

        $response->assertStatus(302);
    }

    public function test_resetpassword()
    {
        $response = $this->get(route('password_reset.edit'));

        $response->assertStatus(403);
    }

    public function test_resetpassword2()
    {
        $response = $this->post(route('password_reset.update'));

        $response->assertStatus(302);
    }

    public function test_resetpassword3()
    {
        $response = $this->get(route('password_reset.edited'));

        $response->assertStatus(302);
    }
}
