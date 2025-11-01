<?php

use Illuminate\Support\Facades\Route;
use App\Models\Trainee;
use App\Http\Controllers\TraineeController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('admin.pages.welcome');
});
// Route::get('/about', function () {
//     return view('pages.about');
// });

Route::get('/contact', function () {
    return view('admin.pages.contact',
[
    "name" => "Rahat",
    "email" => "rahat@example.com",
    "message" => "Hello, this is a test message."

]

);
});

Route::get('/users/{username}/profile/{id?}', function ($username, $id=null) {  
    return view('admin.pages.users', ["user" => $username, "id" => $id]);
});
// Route::get('/trainees', function () {

//     return view(   'pages.trainees.index', 
//     ['trainees'=>Trainee::all() ]
    
//     );
// });

Route::get('/trainees', [TraineeController::class, 'index'])->name("trainees.index");
Route::get('/trainees/{id}', [TraineeController::class, 'show'])->name("trainees.show");

Route::get('/roles', [RolesController::class, 'index'])->name("roles.index");
Route::get('/roles/{id}', [RolesController::class, 'show'])->name("roles.show");





Route::get("/users/create", [UserController::class, "create"])->name("users.create");
Route::post("/users", [UserController::class, "store"])->name("users.store");
Route::get('/users', [UserController::class, 'index'])->name("users.index");
Route::get('/users/{id}', [UserController::class, 'show'])->name("users.show");
Route::post('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::patch('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete("/users/{id}", [UserController::class, "destroy"])->name("users.destroy");
Route::get("/products", [ProductController::class, "index"]);

// Route::get('/trainees/{id}/', function ( $id, ) {  


    
//     return view('pages.trainees.show',
//     ["trainee"=>Trainee::findTrainee($id)]   );
// });