<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

MyRoute::shareVariables();
MyRoute::system();

\MyRoute::auth();
group(['prefix'=>admin,'middleware'=>'auth'],function(){

/* Language Route design */
resource('langs', 'Backend\LangController', 'admin.langs');
Route::post('admin/langs/store', array('as'=>'store_langs' ,'uses'=>'Backend\LangController@store') );
Route::post('admin/langs', array('as' => 'update_file' , 'uses' => 'Backend\LangController@updateFiles'));

/* Settings Route design */
resource('settings', 'Backend\SettingsController','admin.settings');

/* Settings Route design */
resource('users', 'Backend\UsersController','admin.usesrs');

/* Go to Admin Route design */
get('/', 'Backend\HomeController@index','admin.index');

/* Language changing Route design */
get('backend/main_settings', 'Backend\SettingsController@index','main.settings');

/* Users Route design */
resource('users', 'Backend\UserController','admin.users');

/* Pages Route design */
resource('pages', 'Backend\PageController', 'admin.pages');


});


Route::get('/', function () {
    return view('welcome');
});

	/* FrontEnd Pages Route design */
    Route::group(['middleware'=>'locale'], function(){
          
          /* Pages Route if Pages Table is Exists*/
          if (Schema::hasTable('pages')) {

            foreach (\App\Page::all() as $key => $page) {
            
                Route::get($page->uri, ['as'=>$page->name, function() use ($page){
                    return App()->call('App\Http\Controllers\PagesController@show', [
                        'page' => $page,
                        'parameters'=> Route::current()->parameters(),
                    ]);
                }]);
            }      
          }         
    });

    /* Front end Locale Route design */
    Route::get('setlocale/{locale}', function ($locale) {
      \Session::put('locale', $locale);
      return back();
    });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
