<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->char('password',64);
            $table->string('avatar')->comment('头像URL')->default("http://www.gravatar.com/avatar/".rand(0,999999)."?s=100&d=monsterid");
            $table->char('phone',11)->comment('用户手机号')->nullable();
            $table->unsignedTinyInteger('level')->default(1)->comment('用户等级');
            $table->unsignedTinyInteger('sex')->default(1)->comment('用户性别');
            $table->unsignedTinyInteger('vip')->default(0)->comment('VIP用户等级');
            $table->unsignedInteger('credits')->default(0)->comment('用户积分');
            $table->string('realName')->comment('用户真实姓名')->nullable();
            $table->unsignedBigInteger('IDCard')->comment('用户身份证号')->nullable();
            $table->string("job")->nullable()->comment('用户职业');
            $table->string("intro")->nullable()->comment('用户自我介绍');
            $table->string("city")->default(file_get_contents("http://api.2video.cn/v1/addr"))->comment('用户目前居住城市');
            $table->string("hometown")->default(file_get_contents("http://api.2video.cn/v1/addr"))->comment('用户家乡城市');
            $table->unsignedTinyInteger("group_id")->default(1)->comment('用户所在群组ID');
            $table->text("remember_token")->nullable()->comment("用户token");
            $table->unsignedInteger("token_time")->nullable()->comment('token过期时间');
            $table->string('signature')->default("这个用户不懒，但就是没有签名~")->comment('个性签名');
            $table->string('authentication')->nullable()->comment('认证信息');
            $table->ipAddress('ip')->default(file_get_contents("http://api.2video.cn/v1/ip"))->comment('上次登录IP');
            $table->timestamps();
            $table->index('name');
            $table->index('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
