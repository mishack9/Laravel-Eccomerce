<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', [HomeController::class, 'home']);
Route::get('/Products', [HomeController::class, 'Allproduct'])->name('AllProduct');
Route::get('/search', [HomeController::class, 'search_product'])->name('searchProduct');
Route::get('/index/view_detail/{id}', [HomeController::class, 'view_details'])->name('seemore');

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/dashboard', [HomeController::class, 'login_home'])->name('dashboard');
    Route::get('/product/add_to_cart/{id}', [HomeController::class, 'Add_To_Cart'])->name('addToCart');
    Route::get('/my_cart/product', [HomeController::class, 'mycart'])->name('myCart');
    Route::get('/my_cart/product/{id}', [HomeController::class, 'delete_cart'])->name('deleteCart');
    Route::post('/order/confirm_order', [HomeController::class, 'placeOrder'])->name('place_order');
    Route::get('/order/user/order', [HomeController::class, 'my_order'])->name('myOrder');

    Route::post('paypal', [HomeController::class, 'paypal'])->name('paypal');
    Route::get('success', [HomeController::class, 'success'])->name('success');
    Route::get('cancel', [HomeController::class, 'cancel'])->name('cancel');
   
});

Route::get('contact_us', [HomeController::class, 'contact_Us'])->name('contactus');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware('SetLang')->group(function()
{

    Route::get('/admin/dashboard', [HomeController::class, 'index_adminHome'])->middleware(['auth', 'admin']);
    Route::get('/setlang/{lang}', function($lang)
    {
         Session::put('lang', $lang);
         return redirect('admin/dashboard');
    });
    Route::get('/view_catergory', [AdminController::class, 'view_catergory'])->middleware(['auth', 'admin'])->name('view_catergory');
    Route::post('/add_catergory', [AdminController::class, 'CatergoryAdd'])->middleware(['auth', 'admin'])->name('Add_catergory');
    Route::get('/update/catergory/{slug}', [AdminController::class, 'CatergoryUpdate'])->middleware(['auth', 'admin'])->name('updatecatergory');
    Route::put('/edith/catergory/{id}', [AdminController::class, 'update'])->middleware(['auth', 'admin'])->name('catergoryEdith');
    Route::get('/delete/catergory/{id}', [AdminController::class, 'delete'])->middleware(['auth', 'admin'])->name('catergoryDelete');
    
    Route::get('/add_product', [AdminController::class, 'Formproduct'])->middleware(['auth', 'admin'])->name('productAdd');
    Route::post('/add_product/product', [AdminController::class, 'productadd'])->middleware(['auth', 'admin'])->name('AddProduct');
    Route::get('/view_product/product', [AdminController::class, 'productview'])->middleware(['auth', 'admin'])->name('productView');
    Route::get('/update_product/product/{slug}', [AdminController::class, 'productupdate'])->middleware(['auth', 'admin'])->name('updateProduct');
    Route::put('/update_product/product/{id}', [AdminController::class, 'product_update'])->middleware(['auth', 'admin'])->name('Update_Product');
    Route::get('/delete_product/product/{id}', [AdminController::class, 'product_delete'])->middleware(['auth', 'admin'])->name('productDelete');
    Route::get('/search_product/product', [AdminController::class, 'SearchProduct'])->middleware(['auth', 'admin'])->name('search');
    Route::get('/view/user/order', [AdminController::class, 'ViewOrder'])->middleware(['auth', 'admin'])->name('view_order');
    Route::get('/order/user/order/{id}', [AdminController::class, 'DeliverOrder'])->middleware(['auth', 'admin'])->name('deliverorder');
    Route::get('/update/user/order/{id}', [AdminController::class, 'InProgressOrder'])->middleware(['auth', 'admin'])->name('inprogress');
    Route::get('/search/user/order', [AdminController::class, 'searchOrder'])->middleware(['auth', 'admin'])->name('searchOrder');
    Route::get('/print_pdf/{id}', [AdminController::class, 'PDF'])->middleware(['auth', 'admin'])->name('printpdf');
    Route::get('/user/view', [AdminController::class, 'User_View'])->middleware(['auth', 'admin'])->name('userView');
    Route::get('/user/search/data', [AdminController::class, 'search_User'])->middleware(['auth', 'admin'])->name('searchUser');

});







