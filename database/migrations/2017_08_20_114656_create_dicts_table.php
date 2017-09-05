<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dicts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('code', 20)->comment('分类代码');
            $table->string('code_name', 10)->comment('分类名称');
            $table->tinyInteger('value')->unsigned()->comment('字典数值');
            $table->string('text_en', 20)->default('')->comment('字典英文文字');
            $table->string('text', 20)->default('')->comment('字典中文文字');
            $table->tinyInteger('sort_no')->unsigned()->default(0)->comment('排序号');
            $table->tinyInteger('is_active')->unsigned()->default(1)->comment('是否启用');
            $table->string('remarks', 50)->default('')->comment('备注');
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
        Schema::dropIfExists('dicts');
    }
}
