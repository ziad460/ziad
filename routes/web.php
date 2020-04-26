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
//fronend
Route::get('/','home_controller@index');

//category product
Route::get('/product_by_category/{category_id}','home_controller@show_product_by_category');
Route::get('/product_by_manufacture/{manufacture_id}','home_controller@show_product_by_manufacture');
Route::get('/view_product/{product_id}','home_controller@product_details_by_id');
//cart
Route::post('/add-to-cart','cartc@add_to_cart');
Route::get('/show-cart','cartc@show_cart');
Route::get('/delete-to-cart/{rowId}','cartc@delete_cart');
Route::post('/update-cart','cartc@update_cart');
//check
Route::get('/login-check','checkout@login_check');
Route::post('/customer-reg','checkout@reg');
Route::get('/checkout','checkout@checkout');
Route::post('/save-shipping','checkout@save_shipping');
Route::post('/customer-login','checkout@customer_login');
Route::get('/customer-logout','checkout@customer_logout');
Route::get('/payment','checkout@payment');
Route::post('/order-place','checkout@order_place');
Route::get('/manage-order','checkout@manage_order');
Route::get('/view-order','checkout@view_order');





//backend
Route::get('/logout','superadmin@logout');
Route::get('/admin','admin@index');
Route::get('/dashboard','superadmin@index');
Route::post('/admin-dashboard','admin@dashboard');



//category related
Route::get('/add-category','category@index');
Route::get('/all-category','category@all_category');
Route::post('/save-category','category@save_category');
Route::get('/edit-category/{category_id}','category@edit_category');
Route::post('/update-category/{category_id}','category@update_category');
Route::get('/delete-category/{category_id}','category@delete_category');
Route::get('/unactive_category/{category_id}','category@unactive_category');
Route::get('/active_category/{category_id}','category@active_category');

//manufacture brand
Route::get('/add-manufacture','manufacture@index');
Route::post('/save-manufacture','manufacture@save_manufacture');
Route::get('/all-manufacture','manufacture@all_manufacture');
Route::get('/delete-manufacture/{manufacture_id}','manufacture@delete_manufacture');
Route::get('/unactive_manufacture/{manufacture_id}','manufacture@unactive_manufacture');
Route::get('/active_manufacture/{manufacture_id}','manufacture@active_manufacture');
Route::get('/edit-manufacture/{manufacture_id}','manufacture@edit_manufacture');
Route::post('/update-manufacture/{manufacture_id}','manufacture@update_manufacture');

//product
Route::get('/add-product','product@index');
Route::post('/save-product','product@save_product');
Route::get('/all-product','product@all_product');
Route::get('/delete-product/{product_id}','product@delete_product');
Route::get('/unactive_product/{product_id}','product@unactive_product');
Route::get('/active_product/{product_id}','product@active_product');
Route::get('/edit-product/{product_id}','product@edit_product');
Route::post('/update-product/{product_id}','product@update_product');
//slider
Route::get('/add-slider','slider@index');
Route::post('/save-slider','slider@save_slider');
Route::get('/all-slider','slider@all_slider');
Route::get('/delete-slider/{slider_id}','slider@delete_slider');
Route::get('/unactive_slider/{slider_id}','slider@unactive_slider');
Route::get('/active_slider/{slider_id}','slider@active_slider');