<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KeyNameController;

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
    return view('welcome');
});

Auth::routes();
Route::group(['middleware'=>['auth']],function(){
Route::get('/home', [App\Http\Controllers\CategoryConfigurationKeyController::class, 'index'])->name('key.index');
Route::get('keys/create', [App\Http\Controllers\CategoryConfigurationKeyController::class, 'create'])->name('keys.create');
Route::get('/keys', [App\Http\Controllers\CategoryConfigurationKeyController::class, 'index'])->name('keys.index');
Route::post('keys', [App\Http\Controllers\CategoryConfigurationKeyController::class, 'store'])->name('keys.store');
Route::get('keys/edit/{key}', [App\Http\Controllers\CategoryConfigurationKeyController::class, 'edit'])->name('keys.edit');
Route::put('keys/{key}', [App\Http\Controllers\CategoryConfigurationKeyController::class, 'update'])->name('keys.update');
Route::get('keys/{key}', [App\Http\Controllers\CategoryConfigurationKeyController::class,  'getKeyById']);

Route::delete('keys', [App\Http\Controllers\CategoryConfigurationKeyController::class,  'destroy'])->name('keys.destroy');

});
