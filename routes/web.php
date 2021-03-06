<?php

Route::get('/', 'HomeController@index')->name('homepage');

Auth::routes();

Route::get('/dashboard', 'HomeController@dashboard')->name('dashboardUser');

Route::group(['middleware' => 'auth'], function() {

    Route::group(['prefix' => 'users', 'middleware' => 'adminCheck'], function () {

        Route::get('/', 'UsersController@index')->name('senaraiUsers');
        Route::get('/datatables', 'UsersController@datatables')->name('datatablesUsers');
        Route::get('/add', 'UsersController@create')->name('addUser');
        Route::post('/add', 'UsersController@store')->name('storeUser');
        Route::get('/{id}/edit', 'UsersController@edit')->name('editUser');
        Route::patch('/{id}', 'UsersController@update')->name('updateUser');
        Route::delete('/{id}', 'UsersController@destroy')->name('deleteUser');

    });

    Route::group(['prefix' => 'projects'], function () {

        Route::get('/', 'ProjectsController@index')->name('senaraiProjects');
        Route::get('/add', 'ProjectsController@create')->name('addProject');
        Route::post('/add', 'ProjectsController@store')->name('storeProject');
        Route::get('/{id}/edit', 'ProjectsController@edit')->name('editProject');
        Route::patch('/{id}', 'ProjectsController@update')->name('updateProject');
        Route::delete('/{id}', 'ProjectsController@destroy')->name('deleteProject');

    });

    Route::group(['prefix' => 'lokasi'], function () {

        Route::get('/', 'LokasiController@index')->name('senaraiLokasi');
        Route::get('/add', 'LokasiController@create')->name('addLokasi');
        Route::post('add', 'LokasiController@store')->name('storeLokasi');
        Route::get('/{id}/edit', 'LokasiController@edit')->name('editLokasi');
        Route::patch('/{id}', 'LokasiController@update')->name('updateLokasi');
        Route::delete('/{id}', 'LokasiController@destroy')->name('deleteLokasi');

    });

});

