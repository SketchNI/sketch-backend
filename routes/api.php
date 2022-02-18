<?php

use App\Http\Controllers\Api\{
    BlogController,
    PageController,
    ProjectController,
    ToolController};
use Illuminate\Support\Facades\Route;

Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/tools', [ToolController::class, 'index']);
Route::get('/pages/{id}', [PageController::class, 'show']);

Route::prefix('blog')->name('blog.')->group(function() {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/{topic}/{slug}', [BlogController::class, 'show'])->name('show');
});
