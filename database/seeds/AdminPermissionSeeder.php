<?php
namespace Seeder;

use Illuminate\Database\Seeder;

class AdminPermissionSeeder extends Seeder
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
            'permission_include' => '',
            'status'             => 1,
        ]);

        foreach (range(1, 10) as $index) {
            $data = [
                'text'               => '管理员' . $index,
                'permission_include' => $index,
                'status'             => 1,
            ];
        }
        \App\Models\AdminPermission::insert($data);
    }
}
