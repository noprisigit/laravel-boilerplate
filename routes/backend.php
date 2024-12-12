<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Backend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $template = get_admin_template_base_path();

    return view($template . '.layouts.app');
});

Route::prefix('apps')->group(function() {
    Route::resource('users', \App\Http\Controllers\Backend\UserController::class);
    Route::resource('roles', \App\Http\Controllers\Backend\RoleController::class);
});
