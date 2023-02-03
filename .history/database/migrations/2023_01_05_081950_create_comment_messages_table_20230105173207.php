<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 多対多のマイグレーション
        Schema::create('comment_messages', function (Blueprint $table) {
            $table->foreignId('comment_id');
            $table->foreignId('message_id');
            $table->primary(['comment_id', 'message_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_messages');
    }
};