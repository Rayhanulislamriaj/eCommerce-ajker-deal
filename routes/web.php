<?php

use App\Http\Controllers\
{
    CategoryController,
    ProfileController,
    FrontendController,
    VendorController,
    HomeController,
    AdminController,
    ProductController,
    AttributeController,
    CouponController,
    DeliveryController,
    SslCommerzPaymentController,
    SocialiteController
};
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('product/details/{id}', [FrontendController::class, 'product_details'])->name('product.details');
Route::post('get/size/lists', [FrontendController::class, 'get_size_lists'])->name('get.size.lists');
Route::post('get/price/quantity', [FrontendController::class, 'get_price_quantity'])->name('get.price.quantity');
Route::post('add/to/cart', [FrontendController::class, 'add_to_cart'])->name('add.to.cart');
Route::get('cart', [FrontendController::class, 'cart'])->name('cart');
Route::get('cart/remove/{id}', [FrontendController::class, 'cart_remove'])->name('cart.remove');
Route::post('cart/update', [FrontendController::class, 'cart_update'])->name('cart.update');
Route::get('cart/clear', [FrontendController::class, 'cart_clear'])->name('cart.clear');
Route::get('checkout', [FrontendController::class, 'checkout'])->name('checkout');
Route::post('final/checkout', [FrontendController::class, 'final_checkout'])->name('final.checkout');
Route::get('about', [FrontendController::class, 'about'])->name('about');
Route::get('contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('contact/post', [FrontendController::class, 'contact_post']);

//registration via sms
Route::post('send/otp', [FrontendController::class, 'send_otp'])->name('send.otp');
Route::get('resend/otp', [FrontendController::class, 'resend_otp'])->name('resend.otp');
Route::get('submit/otp', [FrontendController::class, 'submit_otp'])->name('submit.otp');
Route::post('validate/otp', [FrontendController::class, 'validate_otp'])->name('validate.otp');

//login via sms
Route::post('login/otp', [FrontendController::class, 'login_otp'])->name('login.otp');
Route::get('resend/login/otp', [FrontendController::class, 'resend_login_otp'])->name('resend.login.otp');
Route::get('submit/login/otp', [FrontendController::class, 'submit_login_otp'])->name('submit.login.otp');
Route::post('login/validate/otp', [FrontendController::class, 'login_validate_otp'])->name('login.validate.otp');


Route::get('dashboard', [HomeController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('download/invoice/{id}', [HomeController::class, 'download_invoice'])->middleware(['auth', 'verified'])->name('download.invoice');
Route::post('add/ddress', [HomeController::class, 'add_address'])->middleware(['auth', 'verified'])->name('add.address');
Route::post('add/ddress/edit', [HomeController::class, 'add_address_edit'])->middleware(['auth', 'verified'])->name('add.address.edit');
Route::get('vendor/approve/{id}', [HomeController::class, 'vendor_approve'])->middleware(['auth'])->name('vendor.approve');



Route::get('give/review/{invoice_id}', [ReviewController::class, 'give_review'])->middleware(['auth', 'verified'])->name('give.review');
Route::post('insert/review/{invoice_details_id}', [ReviewController::class, 'insert_review'])->middleware(['auth', 'verified'])->name('insert.review');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/photo/change', [ProfileController::class, 'profile_photo_change'])->name('profile.photo.change');


    Route::resource('coupon', CouponController::class)->middleware('vendor.cheker');

    Route::resource('delivery', DeliveryController::class)->middleware('admin.cheker');

    //Category Route
    Route::resource('category', CategoryController::class)->middleware('admin.cheker');
    Route::get('category/restore/{id}', [CategoryController::class, 'restore'])->name('category.restore')->middleware('admin.cheker');
    Route::get('category/parmanent/delete/{id}', [CategoryController::class, 'parmanent_delete'])->name('category.parmanent.delete')->middleware('admin.cheker');

    Route::resource('product', ProductController::class)->middleware('vendor.cheker');
    Route::get('stock/{id}', [ProductController::class, 'stock'])->name('stock')->middleware('vendor.cheker');
    Route::post('stock/store/{id}', [ProductController::class, 'stock_store'])->name('stock.store')->middleware('vendor.cheker');
    Route::post('add/stock/{id}', [ProductController::class, 'add_stock'])->name('add.stock')->middleware('vendor.cheker');
    Route::resource('attribute', AttributeController::class)->middleware('vendor.cheker');
    Route::post('color/store', [AttributeController::class, 'color_store'])->name('color.store')->middleware('vendor.cheker');
    Route::post('size/store', [AttributeController::class, 'size_store'])->name('size.store')->middleware('vendor.cheker');
});


Route::get('vendor/register', [VendorController::class, 'register'])->name('vendor.register');
Route::post('vendor/register/post', [VendorController::class, 'register_post'])->name('vendor.register.post');


Route::middleware(['auth', 'admin.cheker'])->group(function () {
    Route::get('add/new/admin', [AdminController::class, 'add_new_admin'])->name('add.new.admin');
    Route::post('add/new/admin/post', [AdminController::class, 'add_new_admin_post'])->name('add.new.admin.post');
    Route::get('deactive/admin/{id}', [AdminController::class, 'deactive_admin'])->name('deactive.admin');
    Route::get('active/admin/{id}', [AdminController::class, 'active_admin'])->name('active.admin');
});





Route::get('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

//Google register/login
Route::get('/google/redirect', [SocialiteController::class, 'google_redirect'])->name('google.redirect');
Route::get('/google/callback', [SocialiteController::class, 'google_callback'])->name('google.callback');




require __DIR__ . '/auth.php';