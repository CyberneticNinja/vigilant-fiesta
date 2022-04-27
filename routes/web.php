<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ClientRecordController;
use Firebase\JWT\JWT; 
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use Firebase\JWT\Key;
use App\Models\Token;
use App\Models\ClientRecord;

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
    $itemsPerPage = 5;
    $page = 3;

    $clients = ClientRecord::all();

    $skip = ($itemsPerPage*$page)-$itemsPerPage;
    $take = $itemsPerPage;
    $clients = $clients->skip($skip)->take($take); 

    echo 'skip : '.$skip.'<br/>';
    dump($clients);
});

// Route::get('/clients/{page}',[ClientRecordController::class,'clientRecord']);