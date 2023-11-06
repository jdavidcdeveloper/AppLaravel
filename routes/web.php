<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// //Acceder usando rutas
// Route::get('/empleado', function () {
//     return view('empleado.index');
// });

// //Acceder usando clases

// Route::get('/empleado/create', [EmpleadoController::class,'create']);

//Acceder a todas las visas
Route::resource('empleado', EmpleadoController::class)->middleware('auth');
Auth::routes(['register'=>false, 'reset'=> false]);

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function (){
    Route::get('/', [EmpleadoController::class, 'index'])->name('home');

}
);
