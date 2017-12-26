<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; 
use App\View\ThemeViewFinder;
use App\View\Composers;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        $this->app['view']->setFinder($this->app['theme.finder']);
        $this->app['view']->composer('layouts.home', Composers\InjectPages::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton('theme.finder', function ($app) {
          $finder = new ThemeViewFinder($app['files'], $app['config']['view.paths']);

          $config = $app['config']['cms.theme'];
          $finder->setBasePath($app['path.public'].'/'.$config['folder']);
          $finder->setActiveTheme($config['active']);

          return $finder;
        });
    }
}