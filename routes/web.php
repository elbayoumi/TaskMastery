<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Website\PageController;
use App\Http\Controllers\Website\TaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('webstie');
})->name('home');
Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');
Route::view('/about-us', 'about-us')->name('about-us');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::post('/contact-us', [PageController::class, 'submitContact'])->name('contact.submit');
Route::get('/contact-us', [PageController::class, 'contact'])->name('contact-us');

Route::get('/dashboard', function () {
    $user=Auth::user();
    $totalTasks = $user->tasks()->count();
    $inProgressTasks = $user->tasks()->where('status', 'doing')->count();
    $completedTasks = $user->tasks()->where('status', 'done')->count();
    $pendingTasks = $user->tasks()->where('status', 'todo')->count();

    return view('dashboard', compact('totalTasks', 'inProgressTasks', 'completedTasks', 'pendingTasks'));

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('tasks', TaskController::class);
    Route::post('tasks/{task}/status', [TaskController::class, 'updateStatus'])->name('tasks.status');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
