<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\Listing;
use Illuminate\Http\Request;
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

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing


// All listings
Route::get('/', [ListingController::class, 'index']);

// VAJEN e ordera na Route-vete, kato pri .htaccess-a
//zashtoto inache prihvasha  '/listings/{listing}'

//show CREATE form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

//Store POST data from form
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

//show EDIT form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// UPDATE job post
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');
// DELETE job post
Route::delete('/listings/{listing}', [ListingController::class, 'delete'])->middleware('auth');

// single listing
Route::get('/listings/{listing}', [ListingController::class, 'show'])->middleware('guest');


// Show Registration Form
Route::get('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/users', [UserController::class, 'create']);

// logout USER
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
// Loged IN user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

/*
Route::get('/hello', function () {
    return response('<h1>Hello World</h1>', 200)
        ->header('Content-Type', 'text/plain')
        ->header('foo', 'bar');
});

Route::get('/posts/{id}', function ($id) {
    return response('Post ' . $id);
})->where('id', '[0-9]+'); // uslovie $id da e 0-9

Route::get('/search', function (Request $request) {
   // dd($request);
 //   dd($request->name, $request->city);
    return $request->name .' - '. $request->city;
});
*/
