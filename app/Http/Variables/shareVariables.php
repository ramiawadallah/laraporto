<?php 
return [
	/* 
	| You Can Add Costom Definds And View Variables
	|
	*/
	// System Defines 
	'defines' => [
		'cp' => 'admin/',
		'admin' => 'admin',
		'upload_path' => public_path('uploads').'/',
		'IMG' => url('uploads').'/',
		'upload_url' => url('uploads').'/',
		'flugs_url' => theme('images/flags').'/',
		'flugs_path' => public_path('themes/default/assets/cms/images/flags').'/',
	],

	// View Variables
	'viewShareVariables' => [
		'cpanel'  => url('themes/default/assets/cms').'/',
		'logo'   => url('/themes/default/assets/cms/images/logo.png'),
		'icon'   => url('/themes/default/assets/cms/images/favicon.png'),
	],


];