<?php

use Illuminate\Database\Seeder;

class LangsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('langs')->truncate();

        DB::table('langs')->insert([
            [ 
                'name'      =>  'English',
                'code'      =>  'en',
                'flug'      =>  'gb.png',
                'direction' =>  'ltr',
                'default'   =>  1,
                ],
                [
                'name'      =>  'Arabic',
                'code'      =>  'ar',
                'flug'      =>  'sa.png',
                'direction' =>  'rtl',
                'default'   =>  0,
                ]      
         ]);

    }
}
