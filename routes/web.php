<?php
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// routes/web.php
Route::get('/', [MovieController::class, 'home'])->name('movies.home');
Route::get('/movies/create', [MovieController::class, 'form'])->name('movies.form');
Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');
Route::delete('/movies/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');
