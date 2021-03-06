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
    return view('public.welcome');
})->name('index');

Route::group(['prefix'=>'redeem','middleware'=>'can:redeem'], function(){
  Route::get('/', 'RedeemController@getIndex')->name('redeem.index');
  Route::get('detail/{id}',
  [
    'uses'=>'RedeemController@getDetail',
    'as'=>'redeem.detail',
    'middleware'=>'can:detail-redeem,id'
  ]
  );
  Route::get('add','RedeemController@addDetail')->name('redeem.add');
  Route::get('delete/{id}','RedeemController@deleteDetail')->name('redeem.delete');
  Route::post('create','RedeemController@redeem')->name('redeem.create');
});
Route::get('redeem/pdf/{id}',
[
  'uses'=>'RedeemController@descargarPDF',
  'as'=>'redeem.pdf',
  'middleware'=>'can:detail-redeem,id'
]
);
Route::get('bill/pdf/{id}',
[
  'uses'=>'CartController@descargarPDF',
  'as'=>'bill.pdf',
  'middleware'=>'can:detail-buy,id'
]
);

Route::group(['prefix'=>'public'], function(){
  Route::get('info/', function () {
      return view('public.info');
  })->name('public.info');

  Route::get('collectioncenter/', 'CollectioncenterController@getIndex'
  )->name('cc.index');

  Route::get('collectioncenter/{id}',
  [
    'uses'=>'CollectioncenterController@getCenter',
    'as'=>'cc.detalle'
  ]
  );

  Route::get('materials',
  [
      'uses' => 'RecyclableMaterialController@getList',
      'as' => 'public.materials',
  ]
  );
  Route::get('materialDetail/{material}',
  [
      'uses' => 'RecyclableMaterialController@detail',
      'as' => 'public.materialDetail',
  ]
  );

  Route::get('coupons',
  [
      'uses' => 'CouponController@getIndex',
      'as' => 'public.coupons',
  ]
  );
  Route::get('couponDetail/{id}',
  [
      'uses' => 'CouponController@getCoupon',
      'as' => 'public.couponDetail',
  ]
  );
});

Route::group(['prefix'=>'adminCenter','middleware'=>'can:management'], function(){
  Route::get('/', [
    'uses'=>'CollectionCenterController@getAdminIndex'
  ]
  )->name('adminCenter.index');

  Route::post('/', [
    'uses'=>'CollectionCenterController@getAdminIndex'
  ]
  )->name('adminCenter.graphic');

  Route::get('create',
  [
    'uses'=>'CollectionCenterController@getCreate',
    'as'=>'adminCenter.create',
    //'middleware'=>'can:create-vj'
  ]);

  Route::post('create',
  [
      'uses' => 'CollectionCenterController@setCreate',
      'as' => 'adminCenter.create'
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
      'as' => 'adminUser.index',
      'middleware'=>'can:management'
  ]
  );

  Route::get('create',
  [
      'uses' => 'UserController@getCreate',
      'as' => 'adminUser.create',
      'middleware'=>'can:management'
  ]
  );

  Route::post('create',
  [
      'uses' => 'UserController@setCreate',
      'as' => 'adminUser.create',
      'middleware'=>'can:management'
  ]
  );

  Route::get('edit/{user}',
  [
      'uses' => 'UserController@getEdit',
      'as' => 'adminUser.edit',
      'middleware'=>'can:edit-user,user'
  ]
  );

  Route::get('editSecure/{user}',
  [
      'uses' => 'UserController@getEdit',
      'as' => 'security.edit',
      'middleware'=>'can:edit-user,user'
  ]
  );

  Route::post('edit/{user}', [
      'uses' => 'UserController@update',
      'as' => 'adminUser.update',
      'middleware'=>'can:edit-user,user'
  ]);

  Route::get('delete/{user}',
  [
    'uses'=>'UserController@delete',
    'as'=>'adminUser.delete',
    'middleware'=>'can:delete-user,user'
  ]
  );

  Route::get('detail/{user}',
  [
    'uses'=>'UserController@detail',
    'as'=>'adminUser.detail'
  ]
  );

  Route::get('password',function(){
    return view("admin.user.password");
  })->name('security.password');

  Route::post('password',[
    'uses' => 'UserController@setPassword',
    'as' => 'adminUser.setPassword'
  ]);

  Route::get('email',function(){
    return view("admin.user.email");
  })->name('security.email');

  Route::post('email',[
    'uses' => 'UserController@setEmail',
    'as' => 'adminUser.setEmail'
  ]);
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
});

Route::group(['prefix'=>'adminCoupon','middleware'=>'can:management'], function(){
  Route::get('/', [
    'uses'=>'CouponController@getAdminIndex'
  ]
  )->name('adminCoupon.index');

  Route::get('create',
  [
    'uses'=>'CouponController@getCreate',
    'as'=>'adminCoupon.create'
  ]);

  Route::get('edit/{id}',
  [
    'uses'=>'CouponController@getEdit',
    'as'=>'adminCoupon.edit'
  ]
  );

  Route::post('create',
  [
      'uses' => 'CouponController@setCreate',
      'as' => 'adminCoupon.create'
  ]
  );
  Route::post('edit', [
      'uses' => 'CouponController@update',
      'as' => 'adminCoupon.update'
  ]);
  Route::get('delete/{id}',
  [
    'uses'=>'CouponController@delete',
    'as'=>'adminCoupon.delete'
  ]
  );
});

Route::group(['prefix'=>'buy','middleware'=>'can:buy'], function(){


  Route::get('wallet',
  [
      'uses' => 'WalletController@getWallet',
      'as' => 'client.wallet',
  ]
  );
  Route::get('redeemDetail/{id}',
  [
    'uses'=>'RedeemController@getDetail',
    'as'=>'client.redeemDetail',
    'middleware'=>'can:detail-redeem,id'
  ]
  );
  Route::get('cart',
  [
      'uses' => 'CartController@getCart',
      'as' => 'client.cart',
  ]
  );

  Route::post('addCart',
  [
      'uses' => 'CartController@addCart',
      'as' => 'client.addCart',
  ]
  );
  Route::get('deleteCoupon/{id}',
  [
      'uses' => 'CartController@deleteCoupon',
      'as' => 'client.deleteCoupon',
  ]
  );
  Route::post('create','CartController@buy')->name('client.buy');
  Route::post('change','CartController@changeCart')->name('client.change');

  Route::get('detail/{id}',
  [
    'uses'=>'CartController@getDetail',
    'as'=>'client.detail',
    'middleware'=>'can:detail-buy,id'
  ]
  );
  Route::get('pdf/{id}',
  [
    'uses'=>'WalletController@PDFDownload',
    'as'=>'client.pdf',
    'middleware'=>'can:detail-buy,id'
  ]
  );

});
