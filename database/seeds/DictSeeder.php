<?php
namespace Database\Seeder;

use Illuminate\Database\Seeder;

class DictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            // 性别
            ['code' => 'gender', 'code_name' => '性别', 'value' => 0, 'text_en' => '', 'text' => '未知'],
            ['code' => 'gender', 'code_name' => '性别', 'value' => 10, 'text_en' => 'male', 'text' => '男'],
            ['code' => 'gender', 'code_name' => '性别', 'value' => 20, 'text_en' => 'female', 'text' => '女'],
            // 是否激活
            ['code' => 'active', 'code_name' => '是否激活', 'value' => 0, 'text_en' => 'not_actived', 'text' => '未激活'],
            ['code' => 'active', 'code_name' => '是否激活', 'value' => 10, 'text_en' => 'is_actived', 'text' => '已激活'],
            // 菜单类型
            ['code' => 'category', 'code_name' => '菜单类型', 'value' => 10, 'text_en' => 'article', 'text' => '文章菜单'],
            ['code' => 'category', 'code_name' => '菜单类型', 'value' => 20, 'text_en' => 'video', 'text' => '视频菜单'],
            // 审核
            ['code' => 'audit', 'code_name' => '审核结果', 'value' => 0, 'text_en' => 'audit_loading', 'text' => '审核中'],
            ['code' => 'audit', 'code_name' => '审核结果', 'value' => 10, 'text_en' => 'audit_refuse', 'text' => '拒绝'],
            ['code' => 'audit', 'code_name' => '审核结果', 'value' => 20, 'text_en' => 'audit_pass', 'text' => '通过'],
            // 邮件类型
            ['code' => 'email_type', 'code_name' => '邮件类型', 'value' => 10, 'text_en' => 'register_active', 'text' => '注册'],
            ['code' => 'email_type', 'code_name' => '邮件类型', 'value' => 20, 'text_en' => 'repassword_email', 'text' => '重置密码'],
        ];
        \App\Models\Dict::insert($data);
    }
}
