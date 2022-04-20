<?php

use App\Http\Controllers\{
    BlogController,
    ContactController,
    IndexController,
    ProjectController,
    ToolController};
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class)->name('index');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{topic}/{slug}', [BlogController::class, 'show'])->name('blog.view');
Route::get('/projects', ProjectController::class)->name('projects');
Route::get('/tools', ToolController::class)->name('tools');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'contact']);


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

});

Route::prefix('canvas-ui')->group(function () {
    Route::prefix('api')->group(function () {
        Route::get('posts', [\App\Http\Controllers\CanvasUiController::class, 'getPosts']);
        Route::get('posts/{slug}', [\App\Http\Controllers\CanvasUiController::class, 'showPost'])
             ->middleware('Canvas\Http\Middleware\Session');

        Route::get('tags', [\App\Http\Controllers\CanvasUiController::class, 'getTags']);
        Route::get('tags/{slug}', [\App\Http\Controllers\CanvasUiController::class, 'showTag']);
        Route::get('tags/{slug}/posts', [\App\Http\Controllers\CanvasUiController::class, 'getPostsForTag']);

        Route::get('topics', [\App\Http\Controllers\CanvasUiController::class, 'getTopics']);
        Route::get('topics/{slug}', [\App\Http\Controllers\CanvasUiController::class, 'showTopic']);
        Route::get('topics/{slug}/posts', [\App\Http\Controllers\CanvasUiController::class, 'getPostsForTopic']);

        Route::get('users/{id}', [\App\Http\Controllers\CanvasUiController::class, 'showUser']);
        Route::get('users/{id}/posts', [\App\Http\Controllers\CanvasUiController::class, 'getPostsForUser']);
    });

    Route::get('/{view?}', [\App\Http\Controllers\CanvasUiController::class, 'index'])
         ->where('view', '(.*)')
         ->name('canvas-ui');
});
