<?php

use App\Http\Controllers\ProfileController;
use App\Mail\RegisterConfirmationMail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\TraineeController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StatusController;




Route::get('/', function () {
    return view('welcome');
});
// Route::get('/test-mail', function () {
//     Mail::to('gilipo5652@wivstore.com')->send(new RegisterConfirmationMail());
//     return view('mails.registration-confirmation');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');




    // Route::get("/users/create", [UserController::class, "create"])->name("users.create");
    // Route::post("/users", [UserController::class, "store"])->name("users.store");
    // Route::get('/users', [UserController::class, 'index'])->name("users.index");
    // Route::get('/users/{id}', [UserController::class, 'show'])->name("users.show");
    // Route::post('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    // Route::patch('/users/{id}', [UserController::class, 'update'])->name('users.update');
    // Route::delete("/users/{id}", [UserController::class, "destroy"])->name("users.destroy");
    // Route::get("/products", [ProductController::class, "index"]);

    Route::resource('users', UserController::class);
    Route::resource('status', StatusController::class);


});




require __DIR__.'/auth.php';
