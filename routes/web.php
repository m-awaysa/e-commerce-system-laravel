<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SalesmanController;
use App\Http\Controllers\Admin\LayoutController;
// use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\OrderController;

use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\PublicProductController;
use App\Http\Controllers\Public\PublicCategoryController;
use App\Http\Controllers\Public\GuestOrderController;


use App\Http\Controllers\User\DiscountController;
use App\Http\Controllers\User\CartController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\EmailVerificationController;

use App\Http\Controllers\Contact\ContactController;

Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::group(['middleware' => ['is_admin'], 'prefix' => 'admin'], function () {

        //dashboard (auth,verified, is_admin)
        Route::group(['prefix' => 'dashboard'], function () {
            Route::get('/', [DashBoardController::class, 'index'])->name('dashboard');
            Route::get('/users', [DashBoardController::class, 'usersActivity'])->name('dashboard.user');
            Route::get('/users/{userId}', [DashBoardController::class, 'userActivityShow'])->name('dashboard.user.show');
            Route::get('/product', [DashBoardController::class, 'productActivity'])->name('dashboard.product');
            Route::get('/fresh', [DashBoardController::class, 'fresh'])->name('dashboard.fresh');
        });

        //product routes (auth,verified, is_admin)
        Route::group(['prefix' => 'product'], function () {
            Route::get('/listProduct', [ProductController::class, 'index'])->name('product');
            Route::get('/add/{category}', [ProductController::class, 'viewAdd'])->name('product.add');
            Route::post('/add/{category}', [ProductController::class, 'add']);
            Route::get('/delete/{product}', [ProductController::class, 'delete'])->name('product.delete');
            Route::get('/edit/{product}', [ProductController::class, 'viewEdit'])->name('product.edit');
            Route::post('/edit/{product}', [ProductController::class, 'edit']);
        });

        //category routes (auth,verified, is_admin)
        Route::group(['prefix' => 'category'], function () {
            Route::get('/listCategory', [CategoryController::class, 'index'])->name('category');
            Route::get('/add', [CategoryController::class, 'viewStore'])->name('category.add');
            Route::post('/add/category', [CategoryController::class, 'store'])->name('category.add.put');
            Route::get('/delete/{category}', [CategoryController::class, 'delete'])->name('category.delete');
            Route::get('/edit/{category}', [CategoryController::class, 'viewEdit'])->name('category.edit');
            Route::post('/edit/{category}', [CategoryController::class, 'edit']);
        });

        //salesman routes (auth,verified, is_admin)
        Route::group(['prefix' => 'salesman'], function () {
            Route::get('', [SalesmanController::class, 'index'])->name('salesman');
            Route::post('/add', [SalesmanController::class, 'add'])->name('salesman.add');
            Route::get('/edit/{user}', [SalesmanController::class, 'viewEdit'])->name('salesman.edit');
            Route::post('/edit/{user}', [SalesmanController::class, 'edit']);
            Route::get('/delete/{salesman}', [SalesmanController::class, 'delete'])->name('salesman.delete');
            Route::get('/pendingAccount', [SalesmanController::class, 'viewPendingAccount'])->name('salesman.pendingAccount');
            Route::post('/accept/{user}', [SalesmanController::class, 'accept'])->name('salesman.accept');
            Route::get('/remove/{user}', [SalesmanController::class, 'removeAccountRequest'])->name('salesman.remove');
        });

        //Layout routes (auth,verified, is_admin)
        Route::group(['prefix' => 'layout/home'], function () {
            Route::group(['prefix' => 'image'], function () {
                Route::get('', [LayoutController::class, 'index'])->name('layout.home');
                Route::post('/add', [LayoutController::class, 'addImage'])->name('layout.home.add');
                Route::get('/delete/{homeImage}', [LayoutController::class, 'deleteHomeImage'])->name('layout.home.image.delete');
                Route::post('/toggle/{homeImage}', [LayoutController::class, 'toggle'])->name('layout.home.image.toggle');
            });

            //layout part (auth,verified, is_admin)
            Route::group(['prefix' => 'part'], function () {
                Route::get('/edit/{homePart}', [LayoutController::class, 'editHomePartView'])->name('layout.home.part.edit');
                Route::get('/delete/{homePart}', [LayoutController::class, 'deleteHomePart'])->name('layout.home.part.delete');
                Route::post('/add', [LayoutController::class, 'addHomePart'])->name('layout.home.part.add');
                Route::get('/product/remove/{homePart}/{product}', [LayoutController::class, 'removeProductFromHomePart'])->name('layout.home.part.product.remove');
                Route::post('/product/add/{homePart}/{product}', [LayoutController::class, 'addProductToHomePart'])->name('layout.home.part.product.add');
            });
        });

        // //sales routes (auth,verified, is_admin). 
        // Route::group(['prefix' => 'sales'], function () {
        //     Route::get('', [SaleController::class, 'index'])->name('sales');
        //     Route::get('/delete/{product}', [SaleController::class, 'delete'])->name('sales.delete');
        //     Route::get('/edit/{product}', [SaleController::class, 'viewEdit'])->name('sales.edit');
        //     Route::post('/edit/{product}', [SaleController::class, 'edit'])->name('sales.edit');
       // });

        //order routes (auth,verified, is_admin)
        Route::group(['prefix' => 'order'], function () {
            Route::get('', [OrderController::class, 'index'])->name('order');
            Route::get('/pendingOrder', [OrderController::class, 'viewPendingOrder'])->name('order.pending');
            Route::post('/add/{order}', [OrderController::class, 'ship'])->name('order.ship');
            Route::get('/edit/{order}', [OrderController::class, 'viewEdit'])->name('order.edit');
            Route::post('/edit/{order}', [OrderController::class, 'edit']);
            Route::get('/delete/{order}', [OrderController::class, 'delete'])->name('order.delete');
            Route::post('/completed/{order}', [OrderController::class, 'sold'])->name('order.sold');
            Route::get('/{order}', [OrderController::class, 'show'])->name('order.show');
        });
        // guest order routes (auth,verified, is_admin)
        Route::group(['prefix' => 'guest/order'], function () {
            Route::get('/pending', [GuestOrderController::class, 'index'])->name('guest.order.pending');
            Route::post('/edit', [GuestOrderController::class, 'editOrder'])->name('guest.order.editAmount');
            Route::get('/delete/{order}', [GuestOrderController::class, 'delete'])->name('guest.order.delete');
            Route::post('/delete/{order}', [GuestOrderController::class, 'accept'])->name('guest.order.accept');
        });
    });

    //salesman routes (auth,verified)
    Route::group(['prefix' => 'salesman/info'], function () {
        Route::get('', [SalesmanController::class, 'salesmanInfo'])->name('salesman.info');
        Route::post('/edit', [SalesmanController::class, 'salesmanEditInfo'])->name('salesman.info.edit');
    });

    //cart route  (auth,verified)
    Route::get('/cart', [CartController::class, 'index'])->name('cart');

    //order for user routes (auth,verified)
    Route::post('/order/add', [OrderController::class, 'request'])->name('order.request');
    //discount (auth,verified)
    Route::get('/discount', [DiscountController::class, 'index'])->name('discount');
});

//email verification routes 
Route::group(['middleware' => ['auth'],['prefix' => 'email']], function () {
    Route::get('/verify', [EmailVerificationController::class, 'index'])
    ->name('verification.notice');

    Route::get('/verify/{id}/{hash}', [EmailVerificationController::class, 'verificationVerify'])
        ->middleware(['signed'])->name('verification.verify');

    Route::post('/verification-notification', [EmailVerificationController::class, 'sendEmailVerification'])
        ->middleware(['throttle:6,1'])->name('verification.send');
});

// guest route
Route::group([], function () {
    //public routes
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/product', [PublicProductController::class, 'index'])->name('public.products');
    Route::get('/product/{category}/product', [PublicProductController::class, 'productsCategory'])->name('public.category.products');
    Route::get('/product/{product}', [PublicProductController::class, 'showProduct'])->name('public.products.product');
    Route::get('/search', [PublicProductController::class, 'search'])->name('search');
    Route::get('/category', [PublicCategoryController::class, 'index'])->name('public.category');
    Route::get('/read-me', [HomeController::class, 'readMe'])->name('readMe');
    Route::post('/guest/order', [GuestOrderController::class, 'order'])->name('guest.order');


    //contact us routes
    Route::group(['prefix' => 'contactUS'], function () {
        Route::get('', [ContactController::class, 'index'])->name('contactUs');
        Route::post('', [ContactController::class, 'sent'])->name('contactUs.sent');
    });

    //login,logout and register routes
    Route::group([], function () {
        Route::get('/login', [LoginController::class, 'index'])->name('login');
        Route::post('/login', [LoginController::class, 'authenticate']);
        Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
        Route::get('/register', [RegisterController::class, 'index'])->name('register');
        Route::post('/register/create', [RegisterController::class, 'create'])->name('register.create');
    });



    //reset password routes
    Route::get('/forgot-password', [PasswordResetController::class, 'index'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetController::class, 'sentResetLink'])->name('password.email');
    Route::get('/reset-password/{token}', [PasswordResetController::class, 'viewResetPasswordPage'])->name('password.reset');
    Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');
});


