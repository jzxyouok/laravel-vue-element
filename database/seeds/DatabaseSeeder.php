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
        $this->call(DictsTableSeeder::class);
    }
}

class AdminsTableSeeder extends Seeder
{
    public function run()
    {
        $data = [];
        foreach (range(1, 10) as $index) {
            $data[] = [
                'username' => 'admin' . $index,
                'email'    => 'admin' . $index . '@qq.com',
                'password' => Hash::make('123456'),
                'status'   => 1,
            ];
        }
        App\Models\Admin::insert($data);
    }
}

class DictsTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['code' => 'gender', 'code_name' => '性别', 'value' => 0, 'text_en' => '', 'text' => '未知'],
            ['code' => 'gender', 'code_name' => '性别', 'value' => 10, 'text_en' => 'male', 'text' => '男'],
            ['code' => 'gender', 'code_name' => '性别', 'value' => 20, 'text_en' => 'female', 'text' => '女'],
        ];
        \App\Models\Dict::insert($data);
    }
}
