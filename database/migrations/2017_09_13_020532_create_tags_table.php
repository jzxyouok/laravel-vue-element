<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('tag_type')->comment('菜单类型');
            $table->string('tag_name')->comment('标签名称');
            $table->string('instruction')->default('')->comment('说明');
            $table->integer('sort')->default(0)->comment('菜单排序，正序');
            $table->tinyInteger('status')->default(1)->comment('状态(0|1)');
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
        Schema::dropIfExists('tags');
    }
}
