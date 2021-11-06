<?php

use App\Http\Controllers\Susbscription\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::get('subscription/invoice/{id}',[SubscriptionController::class,'invoiceDownload'])
->name('subscriptions.invoice.download')->middleware(['subscribed']);
Route::get('subscription/account',[SubscriptionController::class,'account'])
->name('subscriptions.account')->middleware(['subscribed']);
Route::post('subscription/premium',[SubscriptionController::class,'store'])
->name('subscriptions.store');
Route::get('subscription/checkout',[SubscriptionController::class,'index'])
->name('subscriptions.checkout');
Route::get('subscription/premium',[SubscriptionController::class,'premium'])
->name('subscriptions.premium')->middleware(['subscribed']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
