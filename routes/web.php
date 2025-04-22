<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{CategoryController,SubCategoryController, PostController};
use App\Http\Controllers\FrontendController;

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

// Route::get('/', function () {
//     return view('home');
// });
Route::get("/", [FrontendController::class, 'index']);
Route::get("post/{id}", [FrontendController::class, 'getPostById'])->name("frontend.post");
Route::get("posts/{id}", [FrontendController::class, 'getCategoryPosts'])->name("frontend.posts");
Route::get('/search', [FrontendController::class, 'search'])->name('posts.search');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/posts', [FrontendController::class, 'allpost'])->name('allpost');



Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';