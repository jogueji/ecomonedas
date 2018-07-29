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
Route::get('collectioncenter/', 'CollectioncenterController@getIndex'
)->name('cc.index');
Route::get('collectioncenter/{id}',
[
  'uses'=>'VideojuegoController@getCenter',
  'as'=>'cc.detalle'
]
);



Auth::routes();

Route::group(['prefix'=>'adminMaterial', 'middleware'=>'auth'], function(){
  Route::get('', [
    'uses'=>'RecyclableMaterialController@getIndex'
  ]
  )->name('admin.index');
  Route::get('create',
  [
    'uses'=>'RecyclableMaterialController@getCreate',
    'as'=>'admin.create',
    'middleware'=>'can:create-vj'
  ]);
  Route::get('edit/{vj}',
  [
    'uses'=>'RecyclableMaterialController@getEdit',
    'as'=>'admin.edit',
    'middleware'=>'can:update-vj=vj,vj'
  ]
  );
  Route::post('create',
  [
      'uses' => 'VideojuegoController@setCreate',
      'as' => 'admin.create',
      'middleware'=>'can:create-vj'
  ]
  );
  Route::post('edit/{vj}', [
      'uses' => 'VideojuegoController@setEdit',
      'as' => 'admin.update',
      'middleware'=>'can:update-vj=vj,vj'
  ]);
});
