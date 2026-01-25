<?php

use App\Http\Controllers\Admin\AddonCategoryController;
use App\Http\Controllers\Admin\AddonController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,"index"]);

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

//table
Route::get('/admin/table', [TableController::class, "index"]);
Route::post('/admin/table', [TableController::class, "create"]);
Route::get('/admin/table/delete/{id}', [TableController::class, "delete"]);
Route::get('/admin/table/edit/{id}',[TableController::class,'edit']);
Route::post('/admin/table/update/{id}',[TableController::class,"update"]);
//endtable

// addon category
Route::get('/admin/addonCategory', [AddonCategoryController::class, "index"]);
Route::post('/admin/addonCategory', [AddonCategoryController::class, "create"]);
Route::get('/admin/addonCategory/delete/{id}',[AddonCategoryController::class,'delete']);
Route::get('/admin/addonCategory/edit/{id}',[AddonCategoryController::class,'edit']);
Route::post('/admin/addonCategory/update/{id}',[AddonCategoryController::class,'update']);
//end addon category

// addon
Route::get('/admin/addon', [AddonController::class, "index"]);
Route::post('/admin/addon', [AddonController::class, "create"]);
Route::get('/admin/addon/delete/{id}',[AddonController::class,'delete']);
Route::get('/admin/addon/edit/{id}',[AddonController::class,'edit']);
Route::post('/admin/addon/update/{id}',[AddonController::class,'update']);
//end addon
