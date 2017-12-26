<?php 

return [


	'theme' => [
		'folder' => 'themes',
		'active' => 'default'
	],

	'templates' => [
		'home'          => App\Template\HomeTemplate::class,
		'blog' 			=> App\Template\BlogTemplate::class,
		'maintenance'   => App\Template\MaintenanceTemplate::class,
	]

];