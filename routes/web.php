<?php

use App\Http\Controllers\ConvertCharactersAndAppendSpaces;
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

Route::controller(ConvertCharactersAndAppendSpaces::class)->group(static function ()
{
    Route::get('/' ,[ConvertCharactersAndAppendSpaces::class, 'index']);
    Route::post('/',[ConvertCharactersAndAppendSpaces::class, 'post']);
});
