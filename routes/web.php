<?php

use App\Http\Controllers\Admin\AdsSettingController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MediaSocialController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PostCategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProcedureController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Web\ArticleController;
use App\Http\Controllers\Web\ContactController as WebContactController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ProjectController as WebProjectController;
use App\Http\Controllers\Web\ServiceController as WebServiceController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [WebContactController::class, 'index'])->name('contact');
Route::post('/contact', [WebContactController::class, 'store'])->name('webcontact.store');
Route::get('/services', [WebServiceController::class, 'index'])->name('services');
Route::get('/services/{slug}', [WebServiceController::class, 'show'])->name('webservice.show');
Route::get('/projects', [WebProjectController::class, 'index'])->name('projects');
Route::get('/projects/{slug}', [WebProjectController::class, 'show'])->name('webprojects.show');
Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('webarticles.show');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Admin Routes

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/settings/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::post('/settings/contacts', [ContactController::class, 'store'])->name('contacts.store');

    Route::get('/settings/ads', [AdsSettingController::class, 'edit'])->name('ads.edit');
    Route::post('/settings/ads', [AdsSettingController::class, 'update'])->name('ads.update');

    Route::resource('/settings/mediasocial', MediaSocialController::class);
    Route::resource('/services', ServiceController::class);
    Route::resource('/projects', ProjectController::class);
    Route::delete('/projects/images/{id}', [ProjectController::class, 'deleteImage'])->name('projects.images.delete');

    Route::resource('/testimonials', TestimonialController::class);
    Route::resource('/posts/categories', PostCategoryController::class);
    Route::resource('/posts', PostController::class);

    Route::post('/posts/upload-image', [PostController::class, 'uploadImage'])->name('posts.uploadImage');

    Route::resource('/users', UserController::class);
    Route::resource('/messages', MessageController::class);
    Route::resource('/procedures', ProcedureController::class);
});


//Web Routes
