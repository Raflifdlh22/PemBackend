<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use APP\Http\Controllers\StudentController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route untuk menampilkan seluruh semua hewan
Route::get('/animals', [AnimalController::class, "index"]);

// Route untuk menambahkan hewan
Route::post('/animals', [AnimalController::class, "store"]);

// Route untuk mengedit hewan
Route::put('/animals/{id}', [AnimalController::class, "update"]);

// Route untuk menghapus hewan
Route::delete('/animals/{id}', [AnimalController::class, "destroy"]);

// Route untuk menampilkan seluruh semua students
Route::get('/students', [StudentController::class, 'index']);

// Route untuk menambahkan students
Route::post('/students', [StudentController::class, 'store']);

// Route untuk mengedit students
Route::put('/students/{id}', [StudentController::class, 'update']);

// Route untuk menghapus students

Route::delete('/students/{id}', [StudentController::class, 'destroy']);

// Route untuk menampilkan seluruh semua students
Route::get('/students{id}', [StudentController::class, 'show']);
