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

Route::get('/',[
    'uses'=>'FrontendController@index',
    'as'=> 'index'
]);

Route::get('/post/{slug}',[
    'uses'=>'FrontendController@singlepost',
    'as'=>'singlepost'
]);

Route::get('/category/{id}',[
    'uses'=>'FrontendController@category',
    'as'=>'category.view'
]);
Route::get('/result',function(){
    $posts = App\Post::where('title','like','%'. request('query'). '%')->get();
    $title = 'Search Result:'." ". request('query');
    $category = App\Category::take(4)->get();
    $setting = App\Setting::first();


    return view('result',compact('setting','category','posts','title'));
});

Route::get('/tags/{id}',[
    'uses'=>'FrontendController@tag',
    'as'=>'tags'
]);

Auth::routes();



Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
	
	Route::get('/home', [
		'uses'=>'HomeController@index',
		'as' => 'home'
	]);

	Route::get('/create',[
	'uses'=>'PostsController@create',
	'as' => 'post.create'
	]);

	Route::post('/post/store',[
		'uses'=>'PostsController@store',
		'as'=>'post.store'
	]);

	Route::get('/post',[
		'uses'=>'PostsController@index',
		'as'=>'admin.post'
	]);


	Route::get('/post/edit/{id}',[
		'uses'=>'PostsController@edit',
		'as'=>'post.edit'
	]);

	Route::post('/post/update/{id}',[
		'uses'=>'PostsController@update',
		'as' =>'post.update'
	]);

	Route::get('/post/delete/{id}',[
		'uses'=>'PostsController@destroy',
		'as'=>'post.destroy'
	]);

	Route::get('/trashed',[
		'uses'=>'PostsController@trashed',
		'as'=>'trashed'
	]);

		Route::get('/trashed/kill/{id}',[
		'uses'=>'PostsController@kill',
		'as'=>'trashed.kill'
	]);

		Route::get('/trashed/restored/{id}',[
		'uses'=>'PostsController@restored',
		'as'=>'trashed.restored'
	]);

	Route::get('/categories',[
		'uses'=>'CategoriesController@create',
		'as' => 'category.create'

	]);

	Route::post('/categories/store',[
		'uses'=>'CategoriesController@store',
		'as' => 'category.store'
	]);


	Route::get('/categories/index',[
		'uses'=>'CategoriesController@index',
		'as' => 'category'
	]);

	Route::get('/category/edit/{id}',[
		'uses'=>'CategoriesController@edit',
		'as' => 'category.edit'
	]);	

	Route::get('/category/delete/{id}',[
		'uses'=>'CategoriesController@destroy',
		'as' => 'category.destroy'
	]);


	Route::post('/category/update/{id}',[
		'uses'=>'CategoriesController@update',
		'as' => 'category.update'
	]);

	Route::get('/tag',[
		'uses'=>'TagsController@index',
		'as'=>'admin.tag'
	]);

	Route::get('/tag/create',[
		'uses'=>'TagsController@create',
		'as'=>'tag.create'
	]);

	Route::post('/tag/store',[
		'uses'=>'TagsController@store',
		'as'=>'tag.store'
	]);
	
	Route::get('/tag/edit/{id}',[
		'uses'=>'TagsController@edit',
		'as'=>'tag.edit'
	]);

	Route::post('/tag/update/{id}',[
		'uses'=>'TagsController@update',
		'as'=>'tag.update'
	]);

	Route::get('/tag/delete/{id}',[
		'uses'=>'TagsController@destroy',
		'as'=>'tag.delete'
	]);


	Route::get('/users',[
		'uses'=>'UsersController@index',
		'as'=>'user'
	]);

	Route::get('/users/create',[
		'uses'=>'UsersController@create',
		'as'=>'user.create'
	]);

	Route::post('/users/store',[
		'uses'=>'UsersController@store',
		'as'=>'user.store'
	]);

	Route::get('/users/admin/{id}',[
		'uses'=>'UsersController@admin',
		'as'=>'user.admin'
	]);

	Route::get('/users/notadmin/{id}',[
		'uses'=>'UsersController@notadmin',
		'as'=>'user.notadmin'
	]);


	Route::get('/users/delete/{id}',[
		'uses'=>'UsersController@destroy',
		'as'=>'user.delete'
	]);

	Route::get('/profile',[
		'uses'=>'ProfileController@index',
		'as'=>'user.profile'
	]);


	Route::post('/profile/update',[
		'uses'=>'ProfileController@update',
		'as'=>'user.profile.update'
	]);


	Route::get('/setting',[

		'uses'=>'SettingsController@index',
		'as' => 'settings'

	]);

	Route::post('/setting/update',[

		'uses'=>'SettingsController@update',
		'as' => 'setting.update'
	]);


});



