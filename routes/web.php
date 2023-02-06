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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('test')->group(function(){
  Route::get('forcelogin/{id}', function($id){
    return response()->json('forcelogin: '.$id);
  });

  Route::get('logout', function () {
    auth()->logout();
    return response()->json(true);
  });

  Route::get('login/{email}/{password}', function($email, $password){
    $result = Auth::attempt([
      "email" => $email,
      "password" => $password
    ]);
    return response()->json($result);
  });

  Route::get('loggedin', function(){
    return response()->json(auth()->user());
  });

  Route::get('users', function(){
    return response()->json(json_decode(file_get_contents(storage_path('users.json'))));
  });
});

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
