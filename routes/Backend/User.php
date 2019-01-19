<?php
/**
 * All route names are prefixed with 'admin.access'.
 */
Route::group([
    'prefix'     => 'access',
    'as'         => 'access.',
    'namespace'  => 'Access',
    'middleware' => ['permission']
], function () {


        Route::group([], function () {
            Route::get('/user/index', 'UserController@index')->name('user.index');
            Route::get('/user/create', 'UserController@create')->name('user.create');
            Route::post('/user/store', 'UserController@store')->name('user.store');
            Route::any('/user/update', 'UserController@update')->name('user.update');
            Route::post('/user/delete', 'UserController@delete')->name('user.delete');
            //For DataTables
            Route::post('/user/tableGet', 'UserController@tableGet')->name('user.tableGet');
            Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit');
        });


        Route::group([], function () {
            Route::get('/role/index', 'RoleController@index')->name('role.index');
            Route::get('/role/create', 'RoleController@create')->name('role.create');
            Route::any('/role/store', 'RoleController@store')->name('role.store');
            Route::any('/role/update', 'RoleController@update')->name('role.update');
            Route::post('/role/delete', 'RoleController@delete')->name('role.delete');
            //For DataTables
            Route::post('/role/tableGet', 'RoleController@tableGet')->name('role.tableGet');
            Route::get('/role/edit/{id}', 'RoleController@edit')->name('role.edit');
        });



        Route::group([], function () {
            Route::get('/permission/index', 'PermissionController@index')->name('permission.index');
            Route::get('/permission/edit/{id}', 'PermissionController@edit')->name('permission.edit');
            Route::any('/permission/update', 'PermissionController@update')->name('permission.update');
            Route::post('/permission/store', 'PermissionController@store')->name('permission.store');
            Route::post('/permission/delete', 'PermissionController@delete')->name('permission.delete');
            Route::post('/permission/tableGet', 'PermissionController@tableGet')->name('permission.tableGet');
        });

});


?>