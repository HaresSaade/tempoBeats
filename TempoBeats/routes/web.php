<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\SongsController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\LikedPlaylistController;
use App\Http\Controllers\SearchController;
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
Auth::routes(['verify' => true]);
Route::get('/',function(){
    return view('layouts.Bottom');
});
Route::get('/home', [HomePageController::class,'create'])->name('Home');

Route::get('/search',[SearchController::class,'index'])->name('Search');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','checkRole'])->name('dashboard');

Route::get('/track/{trackid}', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('track');

Route::get('/playlist/{playlistname}',[PlaylistController::class,'index'])->middleware(['auth', 'verified'])->name('playlist');

Route::post('/DeleteSong',[PlaylistController::class,'delete'])->middleware(['auth', 'verified'])->name('SongDelete');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/library', function(){
    return view('library');
 })->name('library');

 Route::get('/LikedSongs/{id}',[LikedPlaylistController::class,'index'])->middleware(['auth', 'verified'])->name('likedplaylist');
 Route::post('/DeleteLikedSong',[LikedPlaylistController::class,'delete'])->middleware(['auth', 'verified'])->name('LikedSongDelete');
 Route::post('/AddLikedSong',[LikedPlaylistController::class,'create'])->middleware(['auth', 'verified'])->name('createLikedSong');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('SongDetails/{title}',[SongsController::class,'GetSong'])
->name('trackinf');
require __DIR__.'/auth.php';

Auth::routes();

Route::get('BottomBar',function(){
    return view('layouts.Bottom');
})->name('BottomBar');

Route::get('/SreachS',function(){
    return view('SearchS');
});