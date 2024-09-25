<?php

use App\Http\Controllers\OutletController;
use App\Http\Livewire\Backend\Auth;
use App\Http\Livewire\Backend\Dashboard;
use App\Http\Livewire\Backend\Outlet\Editoutlet;
use App\Http\Livewire\Backend\Outlet\Formoutlet;
use App\Http\Livewire\Backend\Outlet\Outlet;
use App\Http\Livewire\Backend\Product\Detailproduct;
use App\Http\Livewire\Backend\Product\Editproduct;
use App\Http\Livewire\Backend\Product\Formproduct;
use App\Http\Livewire\Backend\Product\Product;
use App\Http\Livewire\Backend\Setting;
use App\Http\Livewire\Backend\User\Edituser;
use App\Http\Livewire\Backend\User\Formuser;
use App\Http\Livewire\Backend\User\User;
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

Route::get('/',Auth::class)->name('home');
Route::get('/dashboard',Dashboard::class)->name('dashboard')->middleware('auth');
Route::get('/operator',User::class)->name('operator')->middleware('auth');
Route::get('/form-operator',Formuser::class)->name('form-operator')->middleware('auth');
Route::get('/edit-operator/{id}',Edituser::class)->name('edit-operator')->middleware('auth');
Route::get('/product',Product::class)->name('product')->middleware('auth');
Route::get('/form-product',Formproduct::class)->name('form-product')->middleware('auth');
Route::get('/edit-product/{id}',Editproduct::class)->name('edit-product')->middleware('auth');
Route::get('/detail-product/{user_id}',Detailproduct::class)->name('detail-product')->middleware('auth');
Route::get('/outlet',Outlet::class)->name('outlet')->middleware('auth');
Route::get('/form-outlet',Formoutlet::class)->name('form-outlet')->middleware('auth');
Route::get('/edit-outlet/{id}',Editoutlet::class)->name('edit-outlet')->middleware('auth');
Route::get('/setting-website',Setting::class)->name('setting-website')->middleware('auth');


Route::post('/logout',[OutletController::class,'logout'])->name('logout');
