<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\materialController;
use App\Http\Controllers\agentController;
use App\Http\Controllers\submitItemController;
use App\Http\Controllers\authenticationController;
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

Route::group(['middleware'=>['Credintial']],function(){
Route::view('master','wel');
//Material Controller
Route::get('newMaterial',[materialController::class,'newMaterial']);
Route::post('addMaterial',[materialController::class,'Store'])->name('save');
Route::get('/index',[materialController::class,'index']);

 // All Items in system
Route::get('/allMaterials',[materialController::class,'allMaterials']);
Route::post('/searchMaterials',[materialController::class,'searchMaterials'])->name('searchMaterials');
//edit bill

//Agent Controller
Route::get('newAgent',[agentController::class,'newAgent']);
Route::post('addAgent',[agentController::class,'addAgent'])->name('addAgent');
 Route::get('/agentIndex',[agentController::class,'index']);

Route::get('delAgent/{id?}',[agentController::class,'delAgent'])->name('delAgent');

Route::get('/editAgent/{id}',[agentController::class,'editAgent']);
Route::post('/updateAgent',[agentController::class,'updateAgent'])->name('updateAgent');
});
 Route::get('/',function ()
{
    return redirect('adminLogin');
});
Route::get('/adminLogin',[authenticationController::class,'newLogin']);
Route::post('submitLogin',[authenticationController::class,'submitLogin'])->name('submitLogin');
Route::get('/logout',[authenticationController::class,'logout'])->name('logout');
Route::get('/invalidCredintial',[authenticationController::class,'invalidCredintial']);






