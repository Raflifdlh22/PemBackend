<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:sanctum')->Group(function () {
    // Route untuk menampilkan seluruh semua hewan
    Route::get('/animals', [AnimalController::class, "index"]);

    // Route untuk menambahkan hewan
    Route::post('/animals', [AnimalController::class, "store"]);

    // Route untuk mengedit hewan
    Route::put('/animals/{id}', [AnimalController::class, "update"]);

    // Route untuk menghapus hewan
    Route::delete('/animals/{id}', [AnimalController::class, "destroy"]);

    // Route untuk menampilkan seluruh semua students
    Route::get('/students', [StudentsController::class, 'index']);

    // Route untuk menambahkan students
    Route::post('/students', [StudentsController::class, 'store']);

    // Route untuk mengedit students
    Route::put('/students/{id}', [StudentsController::class, 'update']);

    // Route untuk menghapus students

    Route::delete('/students/{id}', [StudentsController::class, 'destroy']);

    // Route untuk menampilkan seluruh semua students
    Route::get('/students{id}', [StudentsController::class, 'show']);

    // Route untuk update students
    Route::put('/students/{id}', [StudentsController::class, 'update']);

    // Route untuk menambah students
    Route::post('/students', [StudentsController::class, 'store']);

    // Route untuk untuk mendapatkan detail student
    Route::get('/students/{id}', [StudentsController::class, 'show']);
});



// Route untuk autentikasi Register & Login
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);