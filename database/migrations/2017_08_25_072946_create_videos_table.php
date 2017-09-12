<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->tinyInteger('category_id')->comment('类别id');
            $table->string('title', 100)->comment('标题');
            $table->string('auther', 20)->comment('作者');
            $table->string('url')->comment('视频路径');
            $table->integer('is_audit')->default(0)->comment('审核(select)');
            $table->tinyInteger('status')->default(1)->comment('状态(0|1)');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
