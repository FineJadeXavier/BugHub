<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("user_id")->comment("发表文章的用户ID");
            $table->string("title")->comment("文章标题");
            $table->text("content")->comment("文章内容");
            $table->string("column")->default("分享")->comment("文章所在专栏");
            $table->string("tag")->comment("文章所含标签");
            $table->unsignedInteger("hits")->default(0)->comment("点击数");
            $table->unsignedInteger("cost")->default(0)->comment("文章悬赏多少积分");
            $table->unsignedInteger("comments")->default(0)->comment("评论数");
            $table->unsignedTinyInteger("stick")->default(0)->comment("是否置顶");
            $table->unsignedTinyInteger("elite")->default(0)->comment("是否精华");
            $table->unsignedTinyInteger("finished")->default(0)->comment("是否已解决");
            $table->unsignedTinyInteger("comment_status")->default(0)->comment("是否禁止评论");
            $table->timestamp("last_comments")->nullable()->comment("最后评论时间");
            $table->timestamps();
            $table->index("title");
            $table->index("tag");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
