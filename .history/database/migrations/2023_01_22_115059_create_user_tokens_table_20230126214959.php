<?php
// パスワードリセットマイグレーション
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_tokens', function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->foreignId('user_id')->constrained()->comment('ユーザーのID')->onDelete('cascade'); //外部キー制約
            $table->string('token')->unique()->comment('トークン');
            $table->dateTime('expire_at')->nullable()->comment('トークンの有効期限');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE user_tokens COMMENT 'ユーザートークン'"); //テーブルにコメント追加
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_tokens');
    }
};
