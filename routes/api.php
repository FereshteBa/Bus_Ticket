<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
//API route for register new user
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);

});
Route::group(['middleware' => [['auth:sanctum'],'role_check:company']], function () {

    Route::post('/creat',[\App\Http\Controllers\TicketController::class,'AddNewInfo']);
    Route::post('/edit/{Ticket}',[\App\Http\Controllers\TicketController::class,'EditOldInfo']);
    Route::get ('archive/{Ticket}',[\App\Http\Controllers\TicketController::class,'archiveinformation']);


});
Route::prefix('home')->group(function () {
    Route::get('/',[\App\Http\Controllers\HomeController::class,'Home']);
    Route::get('/comment',[\App\Http\Controllers\HomeController::class,'comment']);

});
Route::post('check',[\App\Http\Controllers\TicketController::class,'FindTicket']);
Route::get('/pay/{id}',[\App\Http\Controllers\PayController::class,'purchase']);
Route::post('reserve/{id}',[\App\Http\Controllers\ReserveController::class,'factorreserve']);
Route::get('generate-pdf', [PDFController::class, 'generatePDF']);
