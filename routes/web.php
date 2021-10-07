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

use App\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


Route::get('/test', function () {
    // Ejecute para crear un role admin
    // $role = Role::create(['name' => 'admin']);


    // // ejecute para crear un usuario con role admin
    // $user = User::create([
    //     'date_of_admission' => '2021-10-5',
    //     'surname' => 'admin',
    //     'second_surname' => 'admin',
    //     'first_name' => 'admin',
    //     'other_name' => 'admin',
    //     'country_of_employment' => 'country_of_employment',
    //     'id_type' => 'id_type',
    //     'identification_card' => '12345345',
    //     'state' => 'active',
    //     'email' => 'admin@example.com',
    //     'password' => Hash::make('12345678'),
    // ]);
    // $user->assignRole('admin');

    //entrar con el id del primer usuario
    \Auth::login(User::find(1));
    return redirect('/');
});


Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index')->name('cidenet');
    Route::post('/store', 'AdminController@store');
    Route::post('/update/{user}', 'AdminController@update');
    Route::get('/show/{identification_card}', 'AdminController@show');
    Route::post('/delete/{id}', 'AdminController@destroy');
});

Route::group(['prefix' => 'PersonalInformation'], function () {
    Route::get('/', 'PersonalInformationController@index')->name('cidenet');
    Route::post('/store', 'PersonalInformationController@store');
    Route::post('/update/{user}', 'PersonalInformationController@update');
    Route::delete('/delete/id}', 'PersonalInformationController@destroy');
});
Route::group(['prefix' => 'employee', 'middleware' => ['role:admin|operation|infrastructure']], function () {
    Route::get('/', 'EmployeeController@index')->name('cidenet');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
