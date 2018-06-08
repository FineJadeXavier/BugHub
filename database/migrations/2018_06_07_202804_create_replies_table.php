<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id')->unsigned()->default(0)->index()->comment('主题id');
            $table->integer('user_id')->unsigned()->default(0)->index()->comment('评论用户id');
            $table->integer('to_user_id')->unsigned()->default(0)->index()->comment('评论目标用户id');
            $table->text('content')->comment('回复内容');
            $table->timestamps();
            $table->engine='InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('replies');
    }
}
