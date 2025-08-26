<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SupportController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin/panel', [AdminController::class, 'admin'])->name('admin')->middleware('auth', 'Admin');
Route::get('/admin/panel/create', [AdminController::class, 'createpage'])->name('createpage')->middleware('auth', 'Admin');
Route::post('/admin/panel/create', [AdminController::class, 'create'])->name('create')->middleware('auth', 'Admin');
Route::get('/admin/edit/page', [AdminController::class, 'editpage'])->name('editpage')->middleware('auth', 'Admin');
Route::get('/admin/edit/{item}', [AdminController::class, 'editall'])->name('editall')->middleware('auth', 'Admin');
Route::patch('/admin/edit/{item}', [AdminController::class, 'edit'])->name('edit')->middleware('auth', 'Admin');
Route::get('/admin/create/konc', [AdminController::class, 'konc'])->name('konc')->middleware('auth', 'Admin');
Route::post('/admin/create/konc', [AdminController::class, 'koncstore'])->name('koncstore')->middleware('auth', 'Admin');
Route::delete('/admin/panel/delete/{item}', [AdminController::class, 'delete'])->name('delete')->middleware('auth', 'Admin');


Route::get('/show/ticket/{Koncert}', [ItemsController::class, 'ShowTicket'])->name('ShowTicket')->middleware('auth');
Route::get('/buy/ticket/{Koncert}', [ItemsController::class, 'BuyTicket'])->name('BuyTicket')->middleware('auth');
Route::post('/buy/ticket/store/{order}', [ItemsController::class, 'BuyTickeStore'])->name('BuyTickeStore')->middleware('auth');

Route::get('/index', [ItemsController::class, 'index'])->name('index');

Route::get('show/items/{item}', [ItemsController::class, 'show'])->name('show');


Route::get('story/shop', [ItemsController::class, 'StoreyShop'])->name('StoreyShop');


Route::get('/support/form', [SupportController::class, 'SupportPage'])->name('SupportPage')->middleware('auth');
Route::post('/support/store', [SupportController::class, 'SupportStore'])->name('SupportStore')->middleware('auth');

///
Route::get('/support/panel', [SupportController::class, 'SupportPanel'])->name('SupportPanel')->middleware('auth', 'support');
Route::get('/support/panel/{SupportForm}', [SupportController::class, 'SupportChange'])->name('SupportChange')->middleware('auth', 'support');
Route::post('/support/panel/{SupportForm}', [SupportController::class, 'SupportChangeStore'])->name('SupportChangeStore')->middleware('auth', 'support');
///
///
Route::get('/my/support/tickets/', [SupportController::class, 'MyssupportTickets'])->name('MyssupportTickets')->middleware('auth');


Route::get('support/sau/so/form/{SupportForm}',[SupportController::class, 'SupportSayUserForm'])->name('SupportSayUserForm')->middleware('auth');
Route::post('supp/say/post/{SupportForm}',[SupportController::class, 'SuppSayPost'])->name('SuppSayPost')->middleware('auth');


Route::get('/registration',[AuthController::class,'RegisterPage'])->name('RegisterPage')->middleware('guest');
Route::post('/registration',[AuthController::class,'RegisterStore'])->name('RegisterStore')->middleware('guest');
Route::get('/login',[AuthController::class,'LoginPage'])->name('login')->middleware('guest');
Route::post('/login',[AuthController::class,'LoginStore'])->name('LoginStore')->middleware('guest');

Route::get('/logout',[AuthController::class,'Logout'])->name('logout')->middleware('auth');

Route::get('/profile/{user}',[AuthController::class,'Profile'])->name('Profile')->middleware('auth');
