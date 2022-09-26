<?php

use App\Http\Controllers\Admin\ChecklistController;
use App\Http\Controllers\Admin\ChecklistGroupController;
use App\Http\Controllers\Admin\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(["middleware"=>"auth"], function() {
    Route::get('/dashboard', function() {
        return view("dashboard");
    })->name('dashboard');


    Route::group(["prefix"=>"admin","middleware"=>"is_admin", "as"=>"admin."], function() {
        Route::resource('pages', PageController::class);
        Route::resource('checklist_groups', ChecklistGroupController::class);
        Route::resource('checklist_groups.checklists', ChecklistController::class);


    });
});
require __DIR__.'/auth.php';
