<?php 

namespace App\Template;

use Illuminate\View\View;
use App\Setting;
use Carbon\Carbon;
use DB;


class MaintenanceTemplate extends AbstractTemplate{

	protected $view = 'maintenance';

	protected $settings;


	public function __construct(Setting $settings){
		$this->settings = $settings;
		
	}

	public function prepare(View $view, array $parameters){
		$settings = Setting::all();
		$view->with(compact('settings', $settings));
	}

}