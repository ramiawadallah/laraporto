<?php

use Illuminate\Database\Seeder;
use App\Page;


class PagesSeeder extends Seeder
{

	/**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		\Control::store(request(),'pages',[

			'translate'     => [ 

				'title'		=> 'Home',
				'content'	=> 'Home',
			],
				'uri' 		=> '/',
				'templet'	=> 'home',

		]);

	}


}