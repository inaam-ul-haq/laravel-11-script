<?php

use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

Route::group(
    ['middleware' => 'checkMail'],
    function () {
        Route::get('/', [HomeController::class, 'index'])->name('auth');

        Route::get('profile', [UserController::class, 'editprofile'])->name('myprofile');
        Route::put('edit-my-profile', [UserController::class, 'updatemyprofile'])->name('updatemyprofile');

        Route::get('privacy-safety', [UserController::class, 'safety_privacy'])->name('safety_privacy');

        Route::get('password-change', [ResetPasswordController::class, 'changePassword'])->name('change_password');
        Route::post('change-password/update', [ResetPasswordController::class, 'updatePassword'])->name('update_password');

        Route::prefix('users')->as('users.')->controller(UserController::class)->middleware(['isAdmin'])->group(function () {
            Route::get('', 'index')->name('index')->middleware('can:all_user');
            Route::get('create', 'create')->name('create')->middleware('can:add_user');
            Route::get('show/{user}', 'show')->name('show')->middleware('can:view_user');
            Route::post('store', 'store')->name('store')->middleware('can:add_user');
            Route::get('edit/{user}', 'edit')->name('edit')->middleware('can:edit_user');
            Route::put('update/{user}', 'update')->name('update')->middleware('can:edit_user');
            Route::delete('delete/{user}', 'delete')->name('destroy')->middleware('can:delete_user');
        });

        Route::prefix('roles')->as('roles.')->controller(RoleController::class)->group(function () {
            Route::get('', 'index')->name('index')->middleware('can:all_role');
            Route::post('store', 'store')->name('store')->middleware('can:add_role');
            Route::put('update/{role}', 'update')->name('update')->middleware('can:edit_role');
            Route::delete('delete/{role}', 'destroy')->name('destroy')->middleware('can:delete_role');

            Route::post('assign/permission', 'assign_permission')->name('assign_permission')->middleware('can:assign_permission');
        });

        Route::prefix('s')->as('settings.')->controller(SettingController::class)->group(function () {
            Route::get('basic-info', 'index')->name('index')->can('site_setting');
            Route::put('basic_info/update', 'basic_info')->name('basic_info')->can('site_setting');

            Route::get('smtp', 'smtp_index')->name('smtp')->can('site_setting');
            Route::put('smtp/update', 'smtp_update')->name('smtp_update')->can('site_setting');

            Route::get('social-logins', 'social_logins_index')->name('social_logins')->can('site_setting');
            Route::put('social-logins/update', 'social_logins_update')->name('social_logins_update')->can('site_setting');

            Route::get('payments', 'payments_index')->name('payment')->can('site_setting');
            Route::put('payments/update', 'payment_update')->name('payment_update')->can('site_setting');
        });
    }
);
