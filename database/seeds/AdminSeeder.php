<?php
namespace Seeder;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
