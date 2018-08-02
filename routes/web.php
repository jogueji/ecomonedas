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
})->name('index');
Route::get('collectioncenter/', 'CollectioncenterController@getIndex'
)->name('cc.index');

Route::get('collectioncenter/{id}',
[
  'uses'=>'CollectioncenterController@getCenter',
  'as'=>'cc.detalle'
]
);

Route::group(['prefix'=>'public'], function(){
  Route::get('materials',
  [
      'uses' => 'RecyclableMaterialController@getList',
      'as' => 'public.materials',
  ]
  );
  Route::get('materialDetail',
  [
      'uses' => 'RecyclableMaterialController@detail',
      'as' => 'public.materialDetail',
  ]
  );
});

Route::group(['prefix'=>'adminCenter','middleware'=>'can:management'], function(){
  Route::get('/', [
    'uses'=>'CollectionCenterController@getAdminIndex'
  ]
  )->name('adminCenter.index');

  Route::get('create',
  [
    'uses'=>'CollectionCenterController@getCreate',
    'as'=>'adminCenter.create',
    //'middleware'=>'can:create-vj'
  ]);

  Route::post('create',
  [
      'uses' => 'CollectionCenterController@setCreate',
      'as' => 'adminUser.create'
  ]
  );

  Route::get('edit/{id}',
  [
    'uses'=>'CollectionCenterController@getEdit',
    'as'=>'adminCenter.edit',
    //'middleware'=>'can:update-vj=vj,vj'
  ]
  );

  Route::post('edit', [
      'uses' => 'CollectionCenterController@update',
      'as' => 'adminCenter.update'
  ]);

  Route::get('delete/{center}',
  [
    'uses'=>'CollectionCenterController@delete',
    'as'=>'adminCenter.delete'
  ]
  );


});

Route::group(['prefix'=>'adminUser','middleware'=>'auth'], function(){
  Route::get('/',
  [
      'uses' => 'UserController@getIndex',
      'as' => 'adminUser.index'
  ]
  );

  Route::get('create',function(){
    return view("admin.user.create");
  })->name('adminUser.create');

  Route::post('create',
  [
      'uses' => 'UserController@setCreate',
      'as' => 'adminUser.create'
  ]
  );

  Route::get('edit',function(){
    return view("admin.user.edit");
  })->name('adminUser.edit');

  Route::post('edit', [
      'uses' => 'UserController@update',
      'as' => 'adminUser.update'
  ]);

  Route::get('password',function(){
    return view("admin.user.password");
  })->name('adminUser.password');

  Route::post('password',[
    'uses' => 'UserController@setPassword',
    'as' => 'adminUser.setPassword'
  ]);

  Route::get('email',function(){
    return view("admin.user.email");
  })->name('adminUser.email');

  Route::post('email',[
    'uses' => 'UserController@setEmail',
    'as' => 'adminUser.setEmail'
  ]);

  Route::get('delete/{user}',
  [
    'uses'=>'UserController@delete',
    'as'=>'adminUser.delete'
  ]
  );

  Route::get('detail/{user}',
  [
    'uses'=>'UserController@detail',
    'as'=>'adminUser.detail'
  ]
  );
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
