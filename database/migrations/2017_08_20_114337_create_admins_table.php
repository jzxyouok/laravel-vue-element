<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('username', 20)->comment('用户名');
            $table->string('email', 30)->comment('邮箱');
            $table->string('password', 100)->comment('密码');
            $table->tinyInteger('permission_id')->comment('权限id');
            $table->tinyInteger('permission_include')->comment('权限节点');
            $table->char('last_login_ip', 15)->default(0);
            $table->timestamp('last_login_time')->nullable();
            $table->tinyInteger('status')->default(1)->comment('状态(禁用|启用)');
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('admins');
    }
}
