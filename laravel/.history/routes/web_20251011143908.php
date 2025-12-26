<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\assets;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReservationController;

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

Route::get('/', function () {
    return view('login');
});


Route::get('/assets/{path}', function ($path) {
    $filePath = base_path('app/assets/' . $path);

    if (file_exists($filePath)) {
        return response()->file($filePath);
    }

    abort(404);
});

Route::get('/SignUp',function(){
return view('signup');
});

Route::get('/Addreview/{movie}', function ($movieId) {
    $movie = \App\Models\Movie::findOrFail($movieId);
    return view('addreview', compact('movie'));
})->name('addreview.page');


    Route::get('/Addmovie',function(){
        return view('addmovie');
    });

    Route::get('/admin',function(){
        return view('Admin');
        });
 Route::get('/admin', [UserController::class, 'getAllMoviesadmin']);

Route::post('create',[
'uses'=>'App\Http\Controllers\UserController@inserttotable',
'as'=>'user.create'
]);

Route::get('/Movies',function(){
    return view('movies');
    });

Route::get('/Movies', [UserController::class, 'getAllMovies']);

Route::get('/Film',function(){
    return view('film');
});


Route::get('/searching/{id}', [UserController::class, 'showMovie'])->name('movie.show');



Route::get('/update/{id}',function($id){
    $controller2 = new UserController();
    $movie= $controller2->getmoviebyTitle($id);
return view('updatemovie',compact('movie'));
});



Route::get('login',[
    'uses'=>'App\Http\Controllers\UserController@checklogin',
    'as'=>'user.login'
    ]);

Route::post('/review', [UserController::class, 'addreview'])->name('user.review');

    
Route::post('addmov',[
    'uses'=>'App\Http\Controllers\UserController@addmoviess',
    'as'=>'movie.add'
            ]);

Route::delete('/delete/{id}', [UserController::class, 'deletemovie'])->name('movie.delete');
Route::put('/update/{id}',[UserController::class, 'updatemovie'])->name('movie.update');
Route::get('/movies/search', [UserController::class, 'search']);

Route::get('/movies/{id}/cinemas', [BookingController::class, 'showCinemas'])->name('movie.cinemas');
Route::get('/reserve/{movie}/{cinema}', [ReservationController::class, 'create'])->name('reservation.create');
Route::post('/reserve', [ReservationController::class, 'store'])->name('reservation.store');
// Show all reservations for the logged-in user
Route::get('/my-bookings', [ReservationController::class, 'myBookings'])
    ->name('user.bookings');


       