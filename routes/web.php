<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\TestController;
use PHPUnit\TextUI\XmlConfiguration\Group;

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


Route::view('/', 'welcome');

Route::view('login', 'login')->name('login')->middleware('guest');

    Route::middleware ('auth.basic')->group (function (){

        Route::get('dashboard', [TestController::class, 'dashboard']);
        Route::get('register', [TestController::class, 'register']);
        Route::get('branch', [TestController::class, 'branch']);
        Route::get('pay', [TestController::class, 'pay']);
        Route::get('bill', [TestController::class, 'bill']);
        Route::get('users', [TestController::class, 'users']);
        Route::get('contact', [TestController::class, 'contact']);
        Route::get('cars', [TestController::class, 'cars']);
        Route::get('expenses', [TestController::class, 'expenses']);
        Route::get('bill_detail',[TestController::class, 'bill_detail']); 
        Route::get('notes', [TestController::class, 'notes']);

        Route::post('/dashboard', [TestController::class, 'updateOrCreateCustomersDashboard'])->name('update.customer');
        Route::delete('/dashboard/{id}', [TestController::class, 'deleteCustomersDashboard'])->name('delete.customer');
        Route::get('/dashboard/{id}' , [TestController::class, 'getCustomerDashboard'])->name('get.customer');
    });
    
    Route::get('/logout', '\App\Http\Controllers\TestController@logout');


/* Route::post('login', function() {
    $credentials = request()->only('email', 'password');

    if(Auth::attempt($credentials)) {
        request()->session()->regenerate();

         return redirect('dashboard');
    }
   
    return redirect ('login');
}); */

