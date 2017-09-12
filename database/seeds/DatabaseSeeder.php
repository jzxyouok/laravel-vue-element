<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminsTableSeeder::class);
        $this->call(AdminPermissionsTableSeeder::class);
        $this->call(DictsTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}

class AdminsTableSeeder extends Seeder
{
    public function run()
    {
        $data = [];
        foreach (range(1, 100) as $index) {
            $data[] = [
                'username'           => 'admin' . $index,
                'email'              => 'admin' . $index . '@qq.com',
                'password'           => Hash::make('123456'),
                'permission_id'      => $index,
                'permission_include' => $index,
                'status'             => 1,
            ];
        }
        App\Models\Admin::insert($data);
    }
}

class AdminPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AdminPermission::create([
            'text'               => '超级管理员',
            'permission_include' => '1,2,3,4,5,6,7',
            'status'             => 1,
        ]);

        foreach (range(1, 10) as $index) {
            \App\Models\AdminPermission::create([
                'text'               => '管理员' . $index,
                'permission_include' => $index,
                'status'             => 1,
            ]);
        }
    }
}

class DictsTableSeeder extends Seeder
{
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
        ];
        \App\Models\Dict::insert($data);
    }
}
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'username' => 'test',
            'email'    => '292304400@qq.com',
            'face'     => 'https://ss0.bdstatic.com/5aV1bjqh_Q23odCf/static/superman/img/logo/bd_logo1_31bdc765.png',
            'password' => Hash::make('123123'),
            'active'   => 1,
            'status'   => 1,
        ]);

        foreach (range(1, 100) as $index) {
            \App\Models\User::create([
                'username' => 'test' . $index,
                'email'    => 'user' . $index . '@qq.com',
                'face'     => 'https://ss0.bdstatic.com/5aV1bjqh_Q23odCf/static/superman/img/logo/bd_logo1_31bdc765.png',
                'password' => Hash::make('123123'),
                'active'   => 1,
                'status'   => 1,
            ]);
        }

    }
}
