<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employee\JobApplicationController;
use App\Http\Controllers\JobsApplicationController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/techonologies', [JobsApplicationController::class, 'techonologies'])->name('techonologies');
Route::post('/applyjob', [JobsApplicationController::class, 'applyjobapi'])->name('applyjob.api');

Route::post('/openjobs', [JobsApplicationController::class, 'openjobs'])->name('openjobs');
Route::get('/jobdetails/{id}', [JobsApplicationController::class, 'jobdetails'])->name('jobdetails');
Route::get('/employercandidates', [JobsApplicationController::class, 'employercandidates'])->name('employercandidates');
Route::get('/testapi', [JobsApplicationController::class,'testapi'])->name('testapi');




Route::group(['middleware' => ['jwt.verify']], function() {

});