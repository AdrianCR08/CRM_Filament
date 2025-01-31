<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//    return view('welcome');
// });
use App\Http\Controllers\RolePermissionController;

Route::post('/roles', [RolePermissionController::class, 'createRole']);
Route::post('/permissions', [RolePermissionController::class, 'createPermission']);
Route::post('/roles/assign-permission', [RolePermissionController::class, 'assignPermissionToRole']);