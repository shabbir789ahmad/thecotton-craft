<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\CountController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SocialShareButtonsController;
use App\Http\Controllers\ReturnProductController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;


Route::get('/', function () {
    return view('home');
});
// Route::get('/migrate', function () {
//      Artisan::call('migrate');
// });
Auth::routes();
Route::view('success','success')->name('success');
//google login
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

//facebook login
Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);

Route::get('auth/facebook/callback', [FacebookController::class, 'facebookSignin']);


Route::get('/',[SliderController::class,'women']);
Route::get('/see/all/{id}',[SliderController::class,'seeAll'])->name('all.product');
Route::get('search',[SliderController::class,'search']);


Route::view('all/categories','allcategory')->name('all.categories');

Route::get('master',[SubCategoryController::class,'subCategory']);
Route::get('get/all/category/{id}',[CategoryController::class,'allCategory']);

Route::get('productpage/{id}',[ProductController::class,'productDetail'])->name('productpage');


Route::get('cart',[CartController::class,'cart'])->name('go.to.cart');
Route::post('add-to-cart',[CartController::class,'addToCart'])->name('add.to.cart');

Route::patch('update-cart',[CartController::class,'update'])->name('update.cart');
Route::delete('remove-from-cart',[CartController::class,'remove'])->name('remove.from.cart');

Route::get('get-wishlist',[CartController::class,'getwishlist']);
Route::post('wishlist',[CartController::class,'wishlist'])->name('add.to.wishlist');
Route::patch('update-wishlist',[CartController::class,'updateWishlist'])->name('update.wishlist');
Route::delete('remove-from-wish',[CartController::class,'removeWish'])->name('remove.from.wish');
Route::get('count-cart',[CartController::class,'countCart'])->name('count.cart');

// Route::view('product','product');
Route::get('product/{id}',[ProductController::class,'allproduct'])->name('product.by.category');

//apply cpuon and new arrival
Route::put('apply/copoun',[ProductController::class,'applyCategory'])->name('copoun.new.arrival');

Route::view('about','about_us');
Route::view('contact','contact_us');
Route::post('contact2',[ContactController::class,'contact'])->name('contact2');

Route::view('mail','mail.order_mail');
Route::view('bcd','bcd');

Route::get('checkout',[OrderController::class,'check'])->name('checkout');
Route::post('chechout2',[OrderController::class,'order']);

//submit review route
Route::post('review',[ReviewController::class,'review']);

Route::group(['middleware'=>'auth'],function(){

 Route::get('/social-media-share', [SocialShareButtonsController::class,'ShareWidget']);
 Route::view('order-track','User.order_tracking');
 Route::get('user_dashborad',[Usercontroller::class,'dashboard'])->name('user.dashboard');
 Route::get('your.orders',[Usercontroller::class,'yourOrder'])->name('your.orders');
 Route::get('order-track/{id}',[Usercontroller::class,'track']);
 
 Route::post('buy/{id}/now',[OrderController::class,'orderDirect'])->name('buy.now');
});







//Route for admin works
 Route::group(['middleware'=>'admin.guest'],function(){

Route::view('admin/login','admin.admin_login')->name('admin.login');
Route::post('admins/login',[AdminController::class,'adminLogin'])->name('admins.login');

 });

Route::group(['middleware'=>'admin.auth'],function(){

Route::post('admin/logout',[AdminController::class,'logout'])->name('admin.logout');

Route::view('dashboard','Dashboard.admin')->name('admin.dashboard');
Route::get('dashboard',[CountController::class,'count'])->name('admin.dashboard');

//logo crud opration

Route::resource('logo', LogoController::class);
 //slider crud opration
Route::resource('slider', SliderController::class);
Route::get('show/hide',[SliderController::class,'showHide'])->name('show.hide');
//main category route
Route::resource('category', MainController::class);

//main category route
Route::resource('size', SizeController::class);
//main category route
Route::resource('subcategory', SubCategoryController::class);

//review show and delete route

Route::get('all/reviews',[ReviewController::class,'index'])->name('all.review');

Route::delete('all/reviews/{id}',[ReviewController::class,'destroy'])->name('review.destroy');



//route for product
Route::get('product/upload/admin',[ProductController::class,'subCategory'])->name('admin.product');
Route::get('get/subcategory',[SubCategoryController::class,
    'subCategory']);


Route::post('uproduct',[ProductController::class,'uploadProduct'])->name('admin.uproduct');
Route::get('get-product',[ProductController::class,'getProduct'])->name('admin.get-product');
Route::view('test','Dashboard.test')->name('admin.test');
Route::get('delete-product/{id}',[ProductController::class,'deleteProduct'])->name('admin.delete-product/{id}');
Route::get('update-product/{id}',[ProductController::class,'updateProduct'])->name('admin.update-product/{id}');

Route::post('update-product-detail2',[ProductController::class,'UpdateDetail2'])->name('admin.update-product-detail2');
Route::get('statu',[ProductController::class,'productStatus'])->name('admin.statu');
Route::get('color-status',[ProductController::class,'colorStatus'])->name('admin.color-status');

Route::get('size-status',[ProductController::class,'sizeStatus'])->name('admin.size-status');


Route::get('brand-status',[ProductController::class,'brandStatus'])->name('admin.brand-status');

Route::get('delete-color/{id}',[PriceController::class,'deleteColor'])->name('admin.delete-color/{id}');
Route::get('delete-size/{id}',[PriceController::class,'deleteSize'])->name('admin.delete-size/{id}');
Route::get('delete-brand/{id}',[PriceController::class,'deleteBrand'])->name('admin.delete-brand/{id}');
//route for orders
Route::get('orders',[OrderController::class,'getOrder'])->name('admin.orders');
Route::get('cancel-order/{id}',[OrderController::class,'cancelOrder'])->name('admin.cancel-order/{id}');


Route::get('deleted-order',[OrderController::class,'deletedOrder'])->name('admin.deleted.order');
Route::get('restore-order/{id}',[OrderController::class,'restoreOrder'])->name('restore.order');
Route::delete('delete/permanent/order/{id}',[OrderController::class,'destroy'])->name('delete.permanent.order');


Route::get('show-order/{id}',[OrderController::class,'showOrder'])->name('admin.show-order');
//change status
Route::put('change/status',[OrderController::class,'status'])->name('change.status');
//deleviered
Route::get('delivered',[OrderController::class,'delivered'])->name('admin.delivered');
//product return route
Route::get('return-order/{id}',[ReturnProductController::class,'index'])->name('admin.return-order/{id}');
Route::put('return-order/{id}',[ReturnProductController::class,'returnProduct'])->name('return.order');



  


//route for update filter



Route::get('delete-image/{id}',[PriceController::class,'deleteImage'])->name('admin.delete-image/{id}');
Route::put('update-image',[PriceController::class,'updateImage'])->name('admin.update-image');


Route::post('update-color',[PriceController::class,'updateColor'])->name('admin.update-color');
Route::post('add-color',[PriceController::class,'addColor'])->name('admin.add-color');

Route::post('update-size',[PriceController::class,'updateSize'])->name('admin.update-size');
Route::post('add-size',[PriceController::class,'addSize'])->name('admin.add-size');

Route::post('add-store',[PriceController::class,'addStore'])->name('admin.add-store');
Route::post('update-store',[PriceController::class,'updateStore'])->name('admin.update-store');
//route for colors



//route for brand upload, update and delete

Route::resource('brand', BrandController::class);



 // Route::get('delete-brand/{id}',[BrandController::class,'deleteBrand'])->name('admin.delete-brand/{id}');


//feasture
 Route::resource('shop', ShopController::class);
 Route::resource('ship', CurrencyController::class);
 Route::resource('color', ColorController::class);
//route for social link upload

Route::get('social-link',[SocialController::class,'index'])->name('admin.social-link');



// Route::get('update-link/{id}',[SocialController::class,'updatelink'])->name('admin.update-link/{id}');
Route::post('update-social-link',[SocialController::class,'update'])->name('admin.update-social-link');





//route for color upload
Route::view('categories','Dashboard.home.home_page_heading')->name('admin.categories');
Route::post('front',[SocialController::class,'front'])->name('admin.front');
Route::get('get-front',[SocialController::class,'showfront'])->name('admin.get-front');
Route::get('delete-front/{id}',[SocialController::class,'deleteFront'])->name('admin.delete-front/{id}');
Route::get('update-front/{id}',[SocialController::class,'updateFront'])->name('admin.update-front/{id}');
Route::post('update-front2',[SocialController::class,'updateFront2'])->name('admin.update-front');

});
