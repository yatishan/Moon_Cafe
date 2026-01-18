<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin',[AdminController::class,"index"]);

//category
Route::get('/admin/category', [CategoryController::class, "index"]);
Route::post('/admin/category', [CategoryController::class, "create"]);
Route::get('/admin/category/delete/{id}',[CategoryController::class,'delete']);
Route::get('/admin/category/edit/{id}',[CategoryController::class,'edit']);
Route::post('/admin/category/update/{id}',[CategoryController::class,'update']);
//end category

//menu
Route::get('/admin/menu', [MenuController::class, "index"]);
Route::post('/admin/menu', [MenuController::class, "create"]);
Route::get('/admin/menu/delete/{id}',[MenuController::class,'delete']);
Route::get('/admin/menu/edit/{id}',[MenuController::class,'edit']);
Route::post('/admin/menu/update/{id}',[MenuController::class,'update']);
//endmenu
