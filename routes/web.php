<?php

use App\Http\Controllers\{
    ContactController,
    IndexController,
    ProjectController,
    ToolController};
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class)->name('index');
Route::get('/blog', IndexController::class)->name('blog');
Route::get('/projects', ProjectController::class)->name('projects');
Route::get('/tools', ToolController::class)->name('tools');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'contact']);


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

});
