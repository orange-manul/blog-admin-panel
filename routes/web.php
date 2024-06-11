<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//
//Route::middleware(['auth', 'role:admin'])->group(function () {
//    Route::get('/admin/posts', [PostController::class, 'adminIndex'])->name('admin.posts.index');
//    Route::get('/admin/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
//    Route::post('/admin/posts', [PostController::class, 'store'])->name('admin.posts.store');
//    Route::delete('/admin/posts/{id}', [PostController::class, 'destroy'])->name('admin.posts.destroy');
//});
//
//Route::middleware(['auth', 'role:admin,moderator'])->group(function () {
//    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
//    Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
//});

require __DIR__.'/auth.php';
