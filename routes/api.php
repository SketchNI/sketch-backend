<?php

use App\Http\Controllers\Api\{
    PageController,
    ProjectController,
    ToolController
};
use Illuminate\Support\Facades\Route;

Route::get('/projects', [ProjectController::class, 'index'])->name('api.projects');
Route::get('/tools', [ToolController::class, 'index']);
Route::get('/pages/{id}', [PageController::class, 'show']);
