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
        $this->call('Seeder\AdminSeeder');
        $this->call('Seeder\AdminPermissionSeeder');
        $this->call('Seeder\UserSeeder');
        $this->call('Seeder\DictSeeder');
    }
}
