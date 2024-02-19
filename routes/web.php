<?php

use App\Http\Controllers\GradesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StudentsController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/hello', function(){
//     return ('Hello World !');
// });

Route::get('/', function(){
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function(){
    return view('about', [
        "title" => "About",
        "nama" => "Asyella Veratia",
        "kelas" => "11 PPLG 2",
        "foto" => "public/img/profile.png"
    ]);
});

Route::group(["prefix" => "/student"], function() {
    Route::get("/all", [StudentsController::class, "index"]);
    Route::get("/detail/{student}", [StudentsController::class, "show"])-> name('student.show');
    Route::get("/create", [StudentsController::class, "create"])->name('student.create');
    Route::post("/store", [StudentsController::class, "store"])->name('student.store');
    Route::delete("/delete/{student}", [StudentsController::class, "destroy"])->name("student.destroy");
    Route::get("/{student}/edit", [StudentsController::class, "edit"])->name('student.edit');
    Route::patch("/students/{student}", [StudentsController::class, "update"])->name('student.update');
    
});

Route::group(["prefix" => "/grade"], function() {
    Route::get("/all", [GradesController::class, "index"]);
    Route::get("/form", [GradesController::class, "create"]);
    Route::post("/add", [GradesController::class, "store"])->name('add.grade');
});

Route::get('/login', [LoginController::class, 'show'])-> name('login.show');
Route::post('/login', [LoginController::class, 'authenticate'])-> name('login.auth');
Route::post('/logout', [LoginController::class, 'logout'])-> name('logout');

Route::get('/register', [RegisterController::class, 'show'])-> name('register.show');
Route::post('/register', [RegisterController::class, 'store'])-> name('register.store');


