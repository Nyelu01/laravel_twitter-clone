<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
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


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
              //create new idea
Route::post('/idea', [IdeaController::class, 'store'])->name('idea.store');

        //show idea of a single user
Route::get('/idea/{idea}', [IdeaController::class, 'show'])->name('idea.show');

          //show edit box for  an idea
Route::get('/idea/{idea}/edit', [IdeaController::class, 'edit'])->name('idea.edit');

        //updating an idea
Route::put('/idea/{idea}', [IdeaController::class, 'update'])->name('idea.update');

          //delete an idea
Route::delete('/idea/{idea}', [IdeaController::class, 'destroy'])->name('idea.destroy');

//getting user register page
Route::get('/register', [AuthController::class, 'register'])->name('register');

//saving user data to DB
Route::post('/register', [AuthController::class, 'store']);


//getting user login page
Route::get('/login', [AuthController::class, 'login'])->name('login');

//authenticate user
Route::post('/login', [AuthController::class, 'authenticate']);


          //creating a comment
Route::post('/idea/{idea}/comments', [CommentController::class, 'store'])->name('idea.comments.store');

Route::get('/terms', function(){
    return view('terms');
});



