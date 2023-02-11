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

// $namespace = '\Fen\Fenbooth\Http\Controllers';
// Route::group([
//     'prefix' => 'person', // Must match its `slug` record in the DB > `data_types`
//     'middleware' => ['web'],
//     'as' => 'voyager-person.person.',
//     'namespace' => $namespace,
// ], function () {
//     Route::get('/', ['uses' => 'PersonController@getPosts', 'as' => 'list']);
//     Route::get('{slug}', ['uses' => 'PersonController@getPost', 'as' => 'post']);
// });

Route::get('fenview', function () {
    return view('fenbooth::fenview');
});

Route::get('people', function () {
    return view('fenbooth::layouts/app');
});

// Clear all cache:
Route::get('/clear-all-cache', function() {
    Artisan::call('cache:clear');
	Artisan::call('route:cache');
 	Artisan::call('config:cache');
    Artisan::call('view:clear');
    return 'Cache has been cleared';
});
