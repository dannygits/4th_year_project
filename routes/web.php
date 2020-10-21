<?php

// view
Route::get('/', 'LandingPageController@index')->name('landingpage');
// shop routes
Route::get('/shop', 'ShopController@index')->name('shop');
// product routes
Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');
//cart controller routes
Route::get('/cart', 'CartController@index')->name('cart');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
Route::post('/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');
//save for later routes
Route::delete('/saveForLater/{product}', 'SaveForLaterController@destroy')->name('saveForLater.destroy');
Route::post('/saveForLater/switchToCart/{product}', 'SaveForLaterController@switchToCart')->name('saveForLater.switchToCart');

Route::get('empty', function(){
    Cart::instance('saveForLater')->destroy();
});

//Route for checkout controller 
Route::get('/checkout', 'CheckoutController@index')->name('checkout')->middleware('auth');
Route::get('/guestCheckout', 'CheckoutController@index')->name('guestCheckout');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
//Route for coupon controller 
Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');

//confirmation route
Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/mailable', function(){
    $order = App\Order::find(1); 

    return new App\Mail\OrderPlaced($order);
});

//Routes handling searchpages
Route::get('/search', 'ShopController@search')->name('search');
Route::get('/search-algolia', 'ShopController@searchAlgolia')->name('search-algolia');

//routes handling user pages
Route::get('/my-profile', 'UsersController@edit')->name('users.edit');

Route::middleware('auth')->group(function () {
    Route::get('/my-profile', 'UsersController@edit')->name('users.edit');
    Route::patch('/my-profile', 'UsersController@update')->name('users.update');

    Route::get('/my-orders', 'OrdersController@index')->name('orders.index');
    Route::get('/my-orders/{order}', 'OrdersController@show')->name('orders.show');
});
