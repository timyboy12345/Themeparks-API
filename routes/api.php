<?php

use App\Http\Controllers\Api\BellewaerdeController;
use App\Http\Controllers\Api\EftelingController;
use App\Http\Controllers\Api\ParcAsterixController;
use App\Http\Controllers\Api\PhantasialandController;
use App\Http\Controllers\Api\PortaventuraController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('phantasialand')->group(function () {
    Route::get('pois', function () {
        $response = Http::get('https://api.phlsys.de/api/pois?filter[where][seasons][like]=%25SUMMER%25&compact=true&access_token=auiJJnDpbIWrqt2lJBnD8nV9pcBCIprCrCxaWettkBQWAjhDAHtDxXBbiJvCzkUf');

        return response($response)
            ->header('Content-Type', 'application/json');
    });
});

Route::prefix('efteling')->group(function () {
    Route::get('openingtimes', [EftelingController::class, 'openingTimes']);
    Route::get('waittimes', [EftelingController::class, 'waitTimes']);
    Route::get('pois', [EftelingController::class, 'pois']);
});

Route::prefix('phantasialand')->group(function () {
    Route::get('openingtimes', [PhantasialandController::class, 'openingTimes']);
    Route::get('waittimes', [PhantasialandController::class, 'waitTimes']);
    Route::get('pois', [PhantasialandController::class, 'pois']);
});

Route::prefix('parcasterix')->group(function () {
    Route::get('openingtimes', [ParcAsterixController::class, 'openingTimes']);
    Route::get('waittimes', [ParcAsterixController::class, 'waitTimes']);
    Route::get('pois', [ParcAsterixController::class, 'pois']);
});

Route::prefix('bellewaerde')->group(function () {
    Route::get('openingtimes', [BellewaerdeController::class, 'openingTimes']);
    Route::get('waittimes', [BellewaerdeController::class, 'waitTimes']);
    Route::get('pois', [BellewaerdeController::class, 'pois']);
});

Route::prefix('portaventura')->group(function () {
    Route::get('openingtimes', [PortaventuraController::class, 'openingTimes']);
    Route::get('waittimes', [PortaventuraController::class, 'waitTimes']);
    Route::get('attractions', [PortaventuraController::class, 'attractions']);
    Route::get('restaurants', [PortaventuraController::class, 'restaurants']);
});
