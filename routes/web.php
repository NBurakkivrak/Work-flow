<?php

use App\Http\Controllers\TaskController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/tasks', [TaskController::class, 'createTask']);

Route::post('/tasks/{taskId}/prerequisites', [TaskController::class, 'addPrerequisites']);

Route::get('/tasks', [TaskController::class, 'getAllTasks']);

Route::get('/tasks/order', [TaskController::class, 'orderTasks']);

