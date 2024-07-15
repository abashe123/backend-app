<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PatientController;

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

// Public routes (no authentication required)
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Protected routes (require JWT authentication)
Route::middleware('jwt.auth')->group(function () {
    Route::get('/user', [AuthController::class, 'user']); // Route to fetch authenticated user details
    Route::post('/patient', [PatientController::class, 'patient']); // Route to create a new patient
    Route::get('/patient', [PatientController::class, 'getPatient']); // Route to create a new patient
    Route::get('/patient/{id}', [PatientController::class, 'show']); // Route to fetch all patients
    //Route::get('/patient/{id}', 'PatientController@show');

   
    });


Route::group(['middleware' => ['jwt.auth']], function () {
    Route::get('me', [AuthController::class, 'me']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
});



// Other route examples
// Route::post('/testurl', [AuthController::class, 'testurl']);
// Route::post('/loginuser', [AuthController::class, 'loginuser']);
//Route::post('/patient', [PatientController::class, 'patient']);
// Route::get('/patient', [PatientController::class, 'getPatient']);
