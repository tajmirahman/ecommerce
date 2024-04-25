<?php

use App\Http\Controllers\AdminAuth\AuthenticatedSessionController;
use App\Http\Controllers\AdminAuth\ConfirmablePasswordController;
use App\Http\Controllers\AdminAuth\EmailVerificationNotificationController;
use App\Http\Controllers\AdminAuth\EmailVerificationPromptController;
use App\Http\Controllers\AdminAuth\NewPasswordController;
use App\Http\Controllers\AdminAuth\PasswordController;
use App\Http\Controllers\AdminAuth\PasswordResetLinkController;
use App\Http\Controllers\AdminAuth\VerifyEmailController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ChildController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;

use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\BrandController;


use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')->group(function () {

    Route::get('admin/login', [AuthenticatedSessionController::class, 'create'])
                ->name('admin.login');

    Route::post('admin/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('admin/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('admin.password.request');

    Route::post('admin/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('admin.password.email');

    Route::get('admin/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('admin.password.reset');

    Route::post('admin/reset-password', [NewPasswordController::class, 'store'])
                ->name('admin.password.store');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('admin/verify-email', EmailVerificationPromptController::class)
                ->name('admin.verification.notice');

    Route::get('admin/verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('admin.verification.verify');

    Route::post('admin/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('admin.verification.send');

    Route::get('admin/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('admin.password.confirm');

    Route::post('admin/confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('admin/password', [PasswordController::class, 'update'])->name('admin.password.update');

    Route::get('admin/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('admin.logout');
});

// Route::get('/admin/dashboard', function () {
//     return view('admin.admin.admin_dashboard');
// })->middleware(['auth:admin', 'verified'])->name('admin.dashboard');


Route::middleware('auth:admin')->group(function () {

    //Admin Dashborad
    Route::get('admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    //Admin Profile
    Route::get('admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('admin/profile/update', [AdminController::class, 'AdminProfileUpdate'])->name('admin.profile.update');

    Route::get('admin/password/page', [AdminController::class, 'AdminPasswordPage'])->name('admin.password.page');
    Route::post('password/change', [AdminController::class, 'PasswordChange'])->name('password.change');


});


Route::middleware(['auth:admin', 'verified'])->group(function () {

    //Banner Section
    Route::controller(BannerController::class)->prefix('banner')->group(function () {

        Route::get('/all', 'AllBanner')->name('all.banner');
        Route::post('/store', 'StoreBanner')->name('store.banner');
        Route::post('/update', 'UpdateBanner')->name('update.banner');
        Route::get('/delete/{id}', 'DeleteBanner')->name('delete.banner');

        Route::get('/banner-inactive/{id}', 'BannerInactive')->name('banner.inactive');
        Route::get('/banner-active/{id}', 'BannerActive')->name('banner.active');
    });


    //Brand Section
    Route::controller(BrandController::class)->prefix('brand')->group(function () {

        Route::get('/all', 'AllBrand')->name('all.brand');
        Route::post('/store', 'StoreBrand')->name('store.brand');
        Route::post('/update', 'UpdateBrand')->name('update.brand');
        Route::get('/delete/{id}', 'DeleteBrand')->name('delete.brand');


        Route::get('/inactive-brand/{id}', 'InactiveBrand')->name('inactive.brand');
        Route::get('/active-brand/{id}', 'ActiveBrand')->name('active.brand');
    });

    // Category Section
    Route::controller(CategoryController::class)->prefix('category')->group(function(){

        Route::get('/all', 'CategoryAll')->name('all.category');
        Route::post('/store', 'StoreCategory')->name('store.category');
        Route::post('/update', 'UpdateCategory')->name('update.category');
        Route::get('/delete/{id}', 'DeleteCategory')->name('delete.category');

        Route::get('/inactive-category/{id}', 'InactiveCategory')->name('inactive.category');
        Route::get('/active-category/{id}', 'ActiveCategory')->name('active.category');
    });


    // Sub Category Section
    Route::controller(SubCategoryController::class)->prefix('subcategory')->group(function(){

        Route::get('/all', 'SubCategoryAll')->name('all.subcategory');
        Route::post('/store', 'StoreSubCategory')->name('store.subcategory');
        Route::post('/update', 'UpdateSubCategory')->name('update.subcategory');
        Route::get('/delete/{id}', 'DeleteSubCategory')->name('delete.subcategory');


        Route::get('/inactive-subcategory/{id}', 'InactiveSubCategory')->name('inactive.subcategory');
        Route::get('/active-subcategory/{id}', 'ActiveSubCategory')->name('active.subcategory');

        Route::get('/subcategory/ajax/{category_id}', 'GetSubCategory');

    });

    // Child Section
    Route::controller(ChildController::class)->prefix('child')->group(function(){

        Route::get('/all', 'AllChild')->name('all.child');
        Route::post('/store', 'StoreChild')->name('store.child');

    });

    // Color Section
    Route::controller(ColorController::class)->prefix('color')->group(function(){

        Route::get('/all', 'AllColor')->name('all.color');
        Route::post('/store', 'StoreColor')->name('store.color');
        Route::post('/update', 'UpdateColor')->name('update.color');
        Route::get('/delete/{id}', 'DeleteColor')->name('delete.color');


    });



});
