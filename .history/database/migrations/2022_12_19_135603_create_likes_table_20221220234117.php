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
        Schema::create('likes', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->integer('user_id')->nullable(false);
            $table->foreignId('user_id')->constrained('users')->nullable(false);
            // $table->integer('message_id')->nullable(false);
            $table->foreignId('message_id')->constrained('messages');
            $table->timestamps('created_at')->nullable(false);
            $table->timestamps('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
};
