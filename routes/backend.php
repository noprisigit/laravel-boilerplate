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