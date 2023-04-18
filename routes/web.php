<?php

use App\Http\Controllers\CharacterConverterController;
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

Route::controller(CharacterConverterController::class)->group(static function ()
{
    Route::get('/' ,[CharacterConverterController::class, 'index']);
    Route::post('/',[CharacterConverterController::class, 'convert']);
});
