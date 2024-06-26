<?php

use App\Http\Controllers\DocumentController;
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


Route::get('v1/documents', [DocumentController::class, 'getDocuments']);
Route::get('v1/document/{id}', [DocumentController::class, 'getDocument']);
Route::post('documents/create', [DocumentController::class, 'createDocument']);
