<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservoirController;
use App\Http\Controllers\MemberController;

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

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'reservoirs'], function(){
    Route::get('', [ReservoirController::class, 'index'])->name('reservoir.index');
    Route::get('create', [ReservoirController::class, 'create'])->name('reservoir.create');
    Route::post('store', [ReservoirController::class, 'store'])->name('reservoir.store');
    Route::get('edit/{reservoir}', [ReservoirController::class, 'edit'])->name('reservoir.edit');
    Route::post('update/{reservoir}', [ReservoirController::class, 'update'])->name('reservoir.update');
    Route::post('delete/{reservoir}', [ReservoirController::class, 'destroy'])->name('reservoir.destroy');
    Route::get('show/{reservoir}', [ReservoirController::class, 'show'])->name('reservoir.show');
    Route::get('pdf/{reservoir}', [ReservoirController::class, 'pdf'])->name('reservoir.pdf');
});

Route::group(['prefix' => 'members'], function(){
    Route::get('', [MemberController::class, 'index'])->name('member.index');
    Route::get('create', [MemberController::class, 'create'])->name('member.create');
    Route::post('store', [MemberController::class, 'store'])->name('member.store');
    Route::get('edit/{member}', [MemberController::class, 'edit'])->name('member.edit');
    Route::post('update/{member}', [MemberController::class, 'update'])->name('member.update');
    Route::post('delete/{member}', [MemberController::class, 'destroy'])->name('member.destroy');
    Route::get('show/{member}', [MemberController::class, 'show'])->name('member.show');
});
