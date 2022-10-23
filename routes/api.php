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

    Route::post('/tickets/getUserTickets',  [TicketsController::class, 'get']);//Get One user tickets
    Route::post('/tickets/getDepartmentUser',  [TicketsController::class, 'getDepartmentUserRandom']); //Get Department User Randomly
    Route::post('/tickets/createTicket',  [TicketsController::class, 'createTicket']);//Create New Ticket
    Route::post('/ticket/getTicket',  [TicketsController::class, 'getTicket']);//Get Ticket Master
    Route::post('/ticket/sendTicketAnswer',  [TicketsController::class, 'sendTicketAnswer']);//Get Ticket Master
    Route::post('/ticket/listTicketAnswers',  [TicketsController::class, 'listTicketAnswers']);//Get Ticket Master

});


Route::post('/login', [UsersController::class, 'login']);
Route::post('/register', [UsersController::class, 'store']);//Save User Data

