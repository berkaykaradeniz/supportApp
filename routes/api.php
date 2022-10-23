<?php
use App\Models\Meals;
use App\Models\Users;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\UsersController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('/meals', [MealsController::class, 'index']);
    Route::post('/meals',  [MealsController::class, 'store']);
    Route::put('/meals/{meal}', [MealsController::class, 'update']);
    Route::delete('/meals/{meal}', [MealsController::class, 'delete']);
    
    Route::post('/users', [DuserController::class, 'store']);//Save User Data
    Route::get('/users/{id}',  [DuserController::class, 'get']);//Get User Data
    Route::post('/users/login',  [DuserController::class, 'login']);//User Can Login
    Route::put('/users/{user}', [DuserController::class, 'update']);//Edit User Data
    Route::delete('/users/{user}', [DuserController::class, 'delete']);//Delete User Data


    Route::post('/tickets/getUserTickets',  [TicketsController::class, 'get']);
    Route::post('/tickets/getDepartmentUser',  [TicketsController::class, 'getDepartmentUserRandom']);
    Route::post('/tickets/createTicket',  [TicketsController::class, 'createTicket']);

});


Route::post('/login', [UsersController::class, 'login']);
Route::post('/register', [UsersController::class, 'store']);//Save User Data

