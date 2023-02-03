<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Site'], function() {
    Route::get('/', 'IndexController')->name('site.index');
    Route::get('/search', 'SearchController')->name('site.search');
    Route::get('/product/{product}', 'ProductController')->name('site.product');
    Route::get('/contact', 'ContactController')->name('site.contact');
    Route::group(['namespace' => 'Contact', 'prefix' => 'contact'], function() {
        Route::post('/', 'StoreController')->name('contact.store');
    });
});
Route::group(['namespace' => 'Basket', 'prefix' => 'basket', 'middleware' => 'basket'], function() {
    Route::get('/', 'IndexController')->name('basket.index');
    Route::post('/add/{id}', 'StoreController')->name('basket.store');
    Route::delete('/remove/{id}', 'RemoveController')->name('basket.remove');
});
Route::group(['namespace' => 'Order', 'prefix' => 'order', 'middleware' => 'order'], function() {
    Route::get('/', 'IndexController')->name('order.index');
    Route::post('/', 'StoreController')->name('order.store');
});
Route::group(['namespace' => 'Cabinet', 'prefix' => 'cabinet', 'middleware' => 'cabinet'], function() {
    Route::get('/', 'IndexController')->name('cabinet.index');
});
Route::group(['namespace' => 'Catalog', 'prefix' => 'category'], function() {
    Route::get('/{category}', 'CategoryController')->name('category.index');
});
Route::group(['namespace' => 'User', 'prefix' => 'user'], function() {
    Route::get('/register', 'RegisterController')->name('user.register');
    Route::get('/login', 'LoginController')->name('user.login');
    Route::post('/register', 'StoreController')->name('user.store');
    Route::post('/login', 'AuthController')->name('user.auth');
    Route::get('/logout','LogoutController')->name('user.logout');
});
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::get('/', 'IndexController')->name('admin.index');
    Route::group(['namespace' => 'Order', 'prefix' => 'orders'], function() {
        Route::get('/', 'IndexController')->name('admin.orders.index');
        Route::get('/{order}', 'ShowController')->name('admin.orders.show');
        Route::get('/{order}/edit', 'EditController')->name('admin.orders.edit');
        Route::patch('/{order}', 'UpdateController')->name('admin.orders.update');
        Route::delete('/{order}', 'DestroyController')->name('admin.orders.destroy');
    });
    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function() {
        Route::get('/', 'IndexController')->name('admin.categories.index');
        Route::get('/create', 'CreateController')->name('admin.categories.create');
        Route::post('/', 'StoreController')->name('admin.categories.store');
        Route::get('/{category}/edit', 'EditController')->name('admin.categories.edit');
        Route::patch('/{category}', 'UpdateController')->name('admin.categories.update');
        Route::delete('/{category}', 'DestroyController')->name('admin.categories.destroy');
    });
    Route::group(['namespace' => 'Product', 'prefix' => 'products'], function() {
        Route::get('/', 'IndexController')->name('admin.products.index');
        Route::get('/create', 'CreateController')->name('admin.products.create');
        Route::get('/{product}', 'ShowController')->name('admin.products.show');
        Route::post('/', 'StoreController')->name('admin.products.store');
        Route::get('/{product}/edit', 'EditController')->name('admin.products.edit');
        Route::patch('/{product}', 'UpdateController')->name('admin.products.update');
        Route::delete('/{product}/delete', 'DestroyController')->name('admin.products.destroy');
    });
    Route::group(['namespace' => 'Contact', 'prefix' => 'contacts'], function() {
        Route::get('/', 'IndexController')->name('admin.contacts.index');
        Route::get('/{contact}/edit', 'EditController')->name('admin.contacts.edit');
        Route::patch('/{contact}', 'UpdateController')->name('admin.contacts.update');
        Route::delete('/{contact}/delete', 'DestroyController')->name('admin.contacts.destroy');
    });
    Route::group(['namespace' => 'Discounts', 'prefix' => 'discounts'], function() {
        Route::get('/', 'IndexController')->name('admin.discounts.index');
        Route::post('/', 'DiscountController')->name('admin.discounts.discount');
    });
});
