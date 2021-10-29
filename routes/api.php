<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

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

// Route::resource('products', ProductController::class); /*Dessa forma, ele vai nos dar todas as rotas existentes
// para verificarmos essas rotas, vá até o terminal e digite php artisan route:list*/

//Public Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/products/search/{name}', [ProductController::class, 'search']);
Route::get('/products/search/{id}', [ProductController::class, 'show']);
Route::get('/products', [ProductController::class, 'index']); //Vamos listar tudo que esta no banco

//Protected Routes
Route::group(['middleware'=> ['auth:sanctum']], function () {
    Route::post('/products', [ProductController::class, 'store']); //Aqui chamamos os valores que estão armazenados no controller
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::get('/products/search/{name}', [ProductController::class, 'search']);
    Route::get('user/products/search/{id}', [ProductController::class, 'show']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
