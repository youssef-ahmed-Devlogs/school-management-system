<?php

use App\Http\Controllers\Grades\GradeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Auth::routes();

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/', function () {
            return view('empty');
        });

        Route::resource('grades', GradeController::class);
    });
});
