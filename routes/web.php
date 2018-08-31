<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {

    return view('welcome');
    
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');


//Role 
Route::get('/roles', 'RoleController@index');
Route::get('/roles/create', 'RoleController@create');
Route::post('/roles/store', 'RoleController@store');
Route::get('/roles/{role}/show', 'RoleController@show');
Route::get('/roles/{role}/edit', 'RoleController@edit');
Route::patch('/roles/{role}/update', 'RoleController@update');

//User
Route::get('users',
		[
		'as'=>'users.index',
		'uses'=>'UserController@index',
		'middleware' => ['permission:user_list_view'] 
		]
	);

Route::get('/users/create',
		[
		'as'=>'users.create',
		'uses'=>'UserController@create',
		'middleware' => ['permission:user_add'] 
		]
	);

//Route::get('/users/create', 'UserController@create');
Route::post('/users/store', 'UserController@store');
Route::get('/users/{user}/show', 'UserController@show');
Route::get('/users/{user}/edit', 'UserController@edit');
Route::patch('/users/{user}/update', 'UserController@update');


//Project
Route::get('projects',
		[
		'as'=>'projects.index',
		'uses'=>'ProjectController@index',
		'middleware' => ['permission:project_view'] 
		]
	);
 Route::get('projects/create',
		[
		'as'=>'projects.create',
		'uses'=>'ProjectController@create',
		'middleware' => ['permission:project_add'] 
		]
	);

 Route::post('projects/store',
		[
		'uses'=>'ProjectController@store',
		'middleware' => ['permission:project_add'] 
		]
	);
 
 Route::get('projects/{project}/show',
		[
		'as'=>'projects.show',
		'uses'=>'ProjectController@show',
		'middleware' => ['permission:project_view'] 
		]
	);

//Project Tasks
Route::resource('users.projects.tasks', 'ProjectTaskController');


//Project Categories
Route::get('project-categories',
		[
		'as'=>'project-categories.index',
		'uses'=>'ProjectCategoryController@index',
		'middleware' => ['permission:project_view'] 
		]
	);





