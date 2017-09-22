<?php
namespace Seeder;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 500) as $index) {
            $data[] = [
                'username' => 'user' . $index,
                'email'    => 'userEmail' . $index . '@qq.com',
                'face'     => 'http://owmb1f0qu.bkt.clouddn.com/test/beauty.jpg',
                'password' => Hash::make('123456'),
                'active'   => 1,
                'status'   => 1,
            ];
        }
        App\Models\User::insert($data);
    }
}
