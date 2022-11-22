<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SslCommerzPaymentController;





//backend
Route::get('/admin', [AdminController::Class, 'Admin']);
Route::post('/admin', [AdminController::Class, 'Admin_show']);
Route::get('/dashboard', [SuperadminController::Class, 'Dashboard']);
Route::get('/logout', [SuperadminController::Class, 'logout']);

// category here
//Route::resource('/categories', CategoryController::class);


Route::get('/categories', [CategoryController::class, 'index'] );
Route::get('add-category', [CategoryController::class, 'create'] );
Route::post('add-category', [CategoryController::class, 'store'] );
Route::get('edit-category/{id}', [CategoryController::class, 'edit'] );
Route::put('update-category/{id}', [CategoryController::class, 'update'] );
Route::get('delete-category/{id}', [CategoryController::class, 'destroy'] );

Route::get('/cat-status{Category}', [CategoryController::class, 'cat_change']);


// sub-category here
//Route::resource('/sub-categories', SubcategoryController::class);

Route::get('/sub-categories', [SubcategoryController::class, 'index'] );
Route::get('add-sub-category', [SubcategoryController::class, 'create'] );
Route::post('add-sub-category', [SubcategoryController::class, 'store'] );
Route::get('edit-sub-category/{id}', [SubcategoryController::class, 'edit'] );
Route::put('update-sub-category/{id}', [SubcategoryController::class, 'update'] );
Route::get('delete-sub-category/{id}', [SubcategoryController::class, 'destroy'] );

Route::get('/sub-cat-status{subCategory}', [SubcategoryController::class, 'sub_cat_change']);

// Brand here
//Route::resource('/categories', CategoryController::class);


Route::get('/brand', [BrandController::class, 'index'] );
Route::get('add-brand', [BrandController::class, 'create'] );
Route::post('add-brand', [BrandController::class, 'store'] );
Route::get('edit-brand/{id}', [BrandController::class, 'edit'] );
Route::put('update-brand/{id}', [BrandController::class, 'update'] );
Route::get('delete-brand/{id}', [BrandController::class, 'destroy'] );

Route::get('/brand-status{brand}', [BrandController::class, 'brand_change']);


// Unit here
//Route::resource('/categories', CategoryController::class);


Route::get('/unit', [UnitController::class, 'index'] );
Route::get('add-unit', [UnitController::class, 'create'] );
Route::post('add-unit', [UnitController::class, 'store'] );
Route::get('edit-unit/{id}', [UnitController::class, 'edit'] );
Route::put('update-unit/{id}', [UnitController::class, 'update'] );
Route::get('delete-unit/{id}', [UnitController::class, 'destroy'] );

Route::get('/unit-status{unit}', [UnitController::class, 'unit_change']);


// size here
//Route::resource('/categories', CategoryController::class);


Route::get('/size', [SizeController::class, 'index'] );
Route::get('add-size', [SizeController::class, 'create'] );
Route::post('add-size', [SizeController::class, 'store'] );
Route::get('edit-size/{id}', [SizeController::class, 'edit'] );
Route::put('update-size/{id}', [SizeController::class, 'update'] );
Route::get('delete-size/{id}', [SizeController::class, 'destroy'] );

Route::get('/size-status{size}', [SizeController::class, 'size_change']);

// color here
//Route::resource('/categories', CategoryController::class);


Route::get('/color', [ColorController::class, 'index'] );
Route::get('add-color', [ColorController::class, 'create'] );
Route::post('add-color', [ColorController::class, 'store'] );
Route::get('edit-color/{id}', [ColorController::class, 'edit'] );
Route::put('update-color/{id}', [ColorController::class, 'update'] );
Route::get('delete-color/{id}', [ColorController::class, 'destroy'] );

Route::get('/color-status{color}', [ColorController::class, 'color_change']);

// Product here
//Route::resource('/categories', CategoryController::class);


Route::get('/product', [ProductController::class, 'index'] );
Route::get('add-product', [ProductController::class, 'create'] );
Route::post('add-product', [ProductController::class, 'store'] );
Route::get('edit-product/{id}', [ProductController::class, 'edit'] );
Route::put('update-product/{id}', [ProductController::class, 'update'] );
Route::get('delete-product/{id}', [ProductController::class, 'destroy'] );

Route::get('/product-status{product}', [ProductController::class, 'product_change']);


//frontent
Route::get('/', [HomeController::Class, 'Home']);
Route::get('/details{id}', [HomeController::Class, 'view_details']);
Route::get('product_by_cat/{id}', [HomeController::Class, 'product_by_cat']);
Route::get('product_by_subcat/{id}', [HomeController::Class, 'product_by_subcat']);
Route::get('product_by_brand/{id}', [HomeController::Class, 'product_by_brand']);
Route::get('search', [HomeController::Class, 'search']);

//add to card
Route::post('add-to-cart', [CardController::Class, 'add_to_cart']);
Route::get('cart-delete/{id}', [CardController::Class, 'delete']);

//checkout
//Route::get('checkout', [CheckoutController::Class, 'index']);

//login-check
Route::get('login-check', [CheckoutController::Class, 'login']);
//order-shippingshipp
// Route::post('shipping-address', [CheckoutController::Class, 'save_shipping']);
// Route::get('payment', [CheckoutController::Class, 'payment']);
// Route::post('place-order', [CheckoutController::Class, 'order']);



//login
Route::post('customer-login', [CustomerController::Class, 'login']);
Route::post('customer-registration', [CustomerController::Class, 'registration']);
Route::get('cus-logout', [CustomerController::Class, 'logout']);

//manage order
Route::get('manage-order', [OrderController::class,'manage_order']);
Route::get('view-order/{id}', [OrderController::class,'view_order']);

// SSLCOMMERZ Start
Route::get('/checkout', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

