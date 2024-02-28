<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    Route::get("/all", [StudentsController::class, "index"])-> name('student');
    Route::get("/detail/{student}", [StudentsController::class, "show"])->name('student.show');
    Route::get("/create", [StudentsController::class, "create"])->name('student.create');
    Route::post("/store", [StudentsController::class, "store"])->name('student.store');
    Route::delete("/delete/{student}", [StudentsController::class, "destroy"])->name("student.destroy");
    Route::get("/{student}/edit", [StudentsController::class, "edit"])->name('student.edit');
    Route::patch("/students/{student}", [StudentsController::class, "update"])->name('student.update');
    
});

Route::group(["prefix" => "/grade"], function() {
    Route::get("/all", [GradesController::class, "index"]);
    Route::get("/form", [GradesController::class, "create"]);
    Route::post("/add", [GradesController::class, "store"])->name('grade.add');
});

Route::group(['prefix' => 'auth'], function () {
Route::get('/login', [LoginController::class, 'index'])-> name('login');
Route::post('/loginAdd', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])-> name('logout');
Route::get('/register', [RegisterController::class, 'index'])-> name('register');
Route::post('/registerAdd', [RegisterController::class, 'store'])->name('registerAdd');
})->middleware('guest');

Route::group([ 
    "middleware" => "CheckLogin",
    "prefix" => "/dashboard"], function(){
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/student', [DashboardController::class, 'student']);
    Route::get('/grade', [DashboardController::class, 'grade']);
    Route::get("/student/detail/{student}", [DashboardController::class, "show"])->name('student.show');
});

