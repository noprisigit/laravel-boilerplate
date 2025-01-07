<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Backend Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['web', 'auth', 'verified'])->group(function() {
    Route::get('/dashboard', function () {
        $template = get_admin_template_base_path();

        return view($template . '.layouts.app');
    })->name('dashboard');

    Route::prefix('apps')->group(function () {
        Route::resource('users', \App\Http\Controllers\Backend\UserController::class)->only(['index', 'create', 'edit']);

        Route::resource('roles', \App\Http\Controllers\Backend\RoleController::class)->only(['index', 'create', 'edit']);
        Route::resource('permissions', \App\Http\Controllers\Backend\PermissionController::class)->only('index');
    });
});
