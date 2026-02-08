<?php

use App\Http\Controllers\Admin\AddonCategoryController;
use App\Http\Controllers\Admin\AddonController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuAddonCategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, "index"]);

// Route::middleware(['auth'])->group(function () {

    Route::get('/admin', [AdminController::class, "index"]);

    //category
    Route::group(['prefix' => 'admin/category'], function () {
        Route::get('list', [CategoryController::class, "index"]);
        Route::post('list', [CategoryController::class, "create"]);
        Route::get('delete/{id}', [CategoryController::class, 'delete']);
        Route::get('edit/{id}', [CategoryController::class, 'edit']);
        Route::post('update/{id}', [CategoryController::class, 'update']);
    });

    //end category

    //menu
    Route::group(['prefix' => 'admin/menu'], function () {
        Route::get('list', [MenuController::class, "index"]);
        Route::post('list', [MenuController::class, "create"]);
        Route::get('delete/{id}', [MenuController::class, 'delete']);
        Route::get('edit/{id}', [MenuController::class, 'edit']);
        Route::post('update/{id}', [MenuController::class, 'update']);
    });
    //endmenu

    //table
    Route::group(['prefix' => 'admin/table'], function () {
        Route::get('list', [TableController::class, "index"]);
        Route::post('list', [TableController::class, "create"]);
        Route::get('delete/{id}', [TableController::class, "delete"]);
        Route::get('edit/{id}', [TableController::class, 'edit']);
        Route::post('update/{id}', [TableController::class, "update"]);
    });
    //endtable

    // addon category
    Route::group(['prefix' => 'admin/addonCategory'], function () {
        Route::get('list', [AddonCategoryController::class, "index"]);
        Route::post('list', [AddonCategoryController::class, "create"]);
        Route::get('delete/{id}', [AddonCategoryController::class, 'delete']);
        Route::get('edit/{id}', [AddonCategoryController::class, 'edit']);
        Route::post('update/{id}', [AddonCategoryController::class, 'update']);
    });
    //end addon category

    // addon
    Route::group(['prefix' => 'admin/addon'], function () {
        Route::get('list', [AddonController::class, "index"]);
        Route::post('list', [AddonController::class, "create"]);
        Route::get('delete/{id}', [AddonController::class, 'delete']);
        Route::get('edit/{id}', [AddonController::class, 'edit']);
        Route::post('update/{id}', [AddonController::class, 'update']);
    });
    //end addon

    // menu addon category
    Route::group(['prefix' => 'admin/menu_addon_category'], function () {
        Route::get('list', [MenuAddonCategoryController::class, "index"]);
        Route::post('list', [MenuAddonCategoryController::class, "create"]);
        Route::get('delete/{id}', [MenuAddonCategoryController::class, 'delete']);
        Route::get('edit/{id}', [MenuAddonCategoryController::class, 'edit']);
        Route::post('update/{id}', [MenuAddonCategoryController::class, 'update']);
    });
    //end menu addon category

    //user
    Route::get('/menu',[HomeController::class,'menu']);
    // end user
