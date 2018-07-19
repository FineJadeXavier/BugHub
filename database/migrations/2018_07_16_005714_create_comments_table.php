<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("user_id");
            $table->unsignedInteger("article_id")->comment("文章id");
            $table->unsignedInteger("parent_id")->nullable()->comment("父级评论id");
            $table->unsignedTinyInteger("adopted")->default(0)->comment("是否被采纳");
            $table->unsignedInteger("likes")->default(0)->comment("评论点赞数");
            $table->string("content")->comment("评论内容");
            $table->string("to_user")->nullable()->comment('评论目标用户名');
            $table->timestamps();
            $table->index("content");
            $table->index("article_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
