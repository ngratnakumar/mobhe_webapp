<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');
Route::get('userData', 'Admin\AdminController@userData');
Route::get('checkUserData/{lid}', 'Admin\AdminController@checkUserData');
Route::get('admin', 'Admin\AdminController@index');
Route::get('datas/{type}', 'Admin\AdminController@datas');
Route::get('data', 'Admin\AdminController@data');
Route::get('prana', 'Admin\AdminController@pranaData');
Route::get('mdent', 'Admin\AdminController@mdentData');
Route::get('admin/doctors', 'Admin\AdminController@showDoctors');
Route::get('admin/labs', 'Admin\AdminController@showLabs');
Route::get('admin/data/delete/{id}', 'Admin\AdminController@deleteRequest');
Route::get('admin/data/prana/{id}', 'Admin\AdminController@prana');
Route::get('uDT/{id}', 'Admin\AdminController@userDataTrash');
Route::get('uDD/{id}', 'Admin\AdminController@userDataDone');
Route::get('admin/data/mdent/{id}', 'Admin\AdminController@mdent');
Route::get('admin/data/mdentDone/{id}', 'Admin\AdminController@mdentDone');
Route::get('admin/data/mdentTrash/{id}', 'Admin\AdminController@mdentTrash');
Route::get('admin/data/pranaDone/{id}', 'Admin\AdminController@pranaDone');
Route::get('admin/data/pranaTrash/{id}', 'Admin\AdminController@pranaTrash');
Route::get('admin/preSync', 'Admin\AdminController@preSync');
Route::get('admin/appUsers', 'Admin\AdminController@appUsers');
Route::get('admin/webAppUsers', 'Admin\AdminController@webAppUsers');
Route::any('admin/benchmarkSelectedData/{date}/{type}', 'Admin\AdminController@benchmarkSelectedData');
Route::any('admin/roles/{id}/{role}', 'Admin\AdminController@roles');
Route::any('admin/benchmark', 'Admin\AdminController@benchmark');
Route::any('admin/showMarkers/{id}', 'Admin\AdminController@showMarkers');
Route::any('admin/updateDataMarkers/{id}/{type}/{spid}', 'Admin\AdminController@updateDataMarkers');
#User Login/Register/Authentication
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::resource('user', 'UserController');
#CSS/Js Assets
Route::filter('before', function()
{
	Assets::add('style',"/admin_asset/css/bootstrap.min.css");
	Assets::add('style',"/admin_asset/css/font-awesome.min.css");
	Assets::add('style',"/admin_asset/css/ionicons.min.css");
	Assets::add('style',"/admin_asset/css/datatables/dataTables.bootstrap.css");
	Assets::add('style',"/admin_asset/css/fullcalendar/fullcalendar.print.css");
	Assets::add('style',"/admin_asset/css/fullcalendar/fullcalendar.css");
});
#Maps
Route::post('map/addmap', 'Map\MapController@addmap');
Route::get('map/add', 'Map\MapController@viewForm');
Route::get('map/view', 'Map\MapController@viewMaps');
Route::get('map/viewData', 'Map\MapController@viewData');
#Labs
Route::any('lab/addTest', 'Lab\LabController@addTest');
Route::get('lab/viewTest', 'Lab\LabController@viewLabTests');
Route::get('lab/addTestsForm', function(){
	return View::make('labs.addtest')
	->with("title", "Add Lab Test");
});

Route::any('lab/addTests2Lab', function(){
	return dd(Input::all()); 
});
Route::any('lab/addLTData', 'Lab\LabController@addLTData');
Route::any('lab/updateTests', 'Lab\LabController@updateTests');