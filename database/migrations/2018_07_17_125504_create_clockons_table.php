<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClockonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clockons', function (Blueprint $table) {
            $table->unsignedInteger("user_id")->comment("用户ID");
            $table->unsignedSmallInteger("days")->dafault(0)->comment("连续签到天数");
            $table->timestamps();
            $table->index('user_id');
            $table->index('days');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clockons');
    }
}
