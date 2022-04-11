<?php
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\KorisnikController;
use App\Http\Controllers\DateRangeController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UlogaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentsController;
use Illuminate\Support\Facades\Route;

Route::get('/',[FrontendController::class, 'index']);
Route::get('/autor',[FrontendController::class, 'autor']);
Route::get('/galerija',[FrontendController::class, 'galerija']);
Route::get('/search', [FrontendController::class, 'search'])->name('search');

Route::group(['middleware' => 'admin'], function() {


    // Upravljanje korisnicima

    Route::get('/users/{id?}', [KorisnikController::class, 'show']);
    Route::post('/users/store', [KorisnikController::class, 'store']);
    Route::get('/logs', [FrontendController::class, 'showlogs']);
    Route::get('/flogs', [DateRangeController::class, 'index']);
    Route::post('/users/update/{id}',[KorisnikController::class, 'update']);
    Route::get('/users/destroy/{id}',[KorisnikController::class, 'destroy']);

    // Upravljanje ulogama

    Route::get('/roles/{id?}', [UlogaController::class, 'show']);
    Route::post('/roles/store', [UlogaController::class, 'store']);
    Route::post('/roles/update/{id}',[UlogaController::class, 'update']);
    Route::get('/roles/destroy/{id}',[UlogaController::class, 'destroy']);

});

Route::group(['middleware' => 'user'], function() {

    Route::get('/posts/{id?}', [PostController::class, 'postshow']);
    Route::put('/posts/store', [PostController::class, 'store']);
    Route::put('/posts/update/{id}',[PostController::class, 'update']);
    Route::get('/posts/destroy/{id}',[PostController::class, 'destroy']);

    /*
    Rute za upravljanje komentarima
*/

    Route::post("/comments/{postId}", [CommentsController::class, 'postComment'])->name("postComment");
    Route::post("/post/{postId}/comments/{commentId?}", [CommentsController::class, 'editComment'])->name("editComment");
    Route::get("/comments/{commentId}/delete", [CommentsController::class, 'deleteComment'])->name("deleteComment");
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

});


Route::get('contact-us',[ContactUsController::class, 'index']);
Route::post('contact-us',[ContactUsController::class, 'handleForm']);




// Logovanje

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [KorisnikController::class, 'regshow']);
Route::post('/register/store', [KorisnikController::class, 'regstore']);


Route::get('/post/{id}',[FrontendController::class, 'getPost']);


Route::get('/download',[FrontendController::class, 'download']);

/*Route::post("/postkoment", [CommentsController::class, 'postKoment']);*/
