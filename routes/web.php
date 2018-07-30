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

Auth::routes();

Route::group(['prefix'=>'adminMaterial','middleware'=>'can:management'], function(){
  Route::get('/', [
    'uses'=>'RecyclableMaterialController@getIndex'
  ]
  )->name('adminMaterial.index');

  Route::get('create',
  [
    'uses'=>'RecyclableMaterialController@getCreate',
    'as'=>'adminMaterial.create'
  ]);

  Route::get('edit/{material}',
  [
    'uses'=>'RecyclableMaterialController@getEdit',
    'as'=>'adminMaterial.edit'
  ]
  );

  Route::post('create',
  [
      'uses' => 'RecyclableMaterialController@setCreate',
      'as' => 'adminMaterial.create'
  ]
  );
  Route::post('edit', [
      'uses' => 'RecyclableMaterialController@update',
      'as' => 'adminMaterial.update'
  ]);
  Route::get('delete/{material}',
  [
    'uses'=>'RecyclableMaterialController@delete',
    'as'=>'adminMaterial.delete'
  ]
  );
  Route::get('detail/{material}',
  [
    'uses'=>'RecyclableMaterialController@detail',
    'as'=>'adminMaterial.detail'
  ]
  );
});
