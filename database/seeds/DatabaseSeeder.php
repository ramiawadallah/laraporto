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
        // $this->call(UsersTableSeeder::class);
        $this->call(LangsTableSeeder::class);
    	$this->call(SettingSeeder::class);
        $this->call(UserSeeder::class);
    	$this->call(PagesSeeder::class);
    }
}
