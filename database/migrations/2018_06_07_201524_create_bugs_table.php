<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bugs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->default(0)->index()->comment('用户ID');
            $table->string('sorts',10)->index()->comment('分类');
            $table->string('title',50)->index()->comment('标题');
            $table->text('content')->comment('内容');
            $table->integer('views')->unsigned()->default(0)->comment('查看数');
            $table->integer('reply')->unsigned()->default(0)->comment('回复数');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bugs');
    }
}
