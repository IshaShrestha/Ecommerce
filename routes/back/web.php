<?php


Route::get('/','DashboardController@index')->name('dashboard');

Route::group(['prefix'=>'brand'],function(){

    Route::get('/index','BrandController@index')->name('brand.index');
    Route::get('/create','BrandController@create')->name('brand.create');
    Route::post('/store','BrandController@store')->name('brand.store');
    Route::get('/update/{slug}', 'BrandController@edit')->name('brand.edit');
    Route::post('/update/{slug}','BrandController@update')->name('brand.update');
    Route::delete('/index/{slug}','BrandController@destroy')->name('brand.delete');


});

Route::group(['prefix'=>'category'],function(){
    Route::get('/','CategoryController@index')->name('category.index');
    Route::get('/create','CategoryController@create')->name('category.create');
    Route::post('/store','CategoryController@store')->name('category.store');
    Route::get('/update/{slug}', 'CategoryController@edit')->name('category.edit');
    Route::post('/update/{slug}','CategoryController@update')->name('category.update');
    Route::delete('/index/{slug}','CategoryController@destroy')->name('category.delete');
});

Route::group(['prefix'=>'product'],function(){
    Route::get('/','ProductController@index')->name('product.index');
    Route::get('/create','ProductController@create')->name('product.create');
    Route::post('/store','ProductController@store')->name('product.store');
    Route::get('/update/{slug}','ProductController@edit')->name('product.edit');
    Route::post('/update/{slug}','ProductController@update')->name('product.update');
    Route::delete('/{slug}','ProductController@destroy')->name('product.delete');

});

