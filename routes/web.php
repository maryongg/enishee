<?php
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HumanController;
use App\Models\Human;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/humans/trashed', [HumanController::class, 'trashed'])->name('humans.trashed');
    Route::patch('/humans/{id}/restore', [HumanController::class, 'restore'])->name('humans.restore');
    Route::resource('humans', HumanController::class);
    Route::resource('humans.comments', CommentController::class);

});


require __DIR__.'/auth.php';
