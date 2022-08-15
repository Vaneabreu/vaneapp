<?php

use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::post('login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);


Route::middleware('auth.basic')->group(function (){
    Route::post('/customer-filter-all', [TestController::class, 'getCustomerFilterAll']);
    
    Route::delete('/dashboard/{id}', [TestController::class,'deleteCustomerDashboard'])->name('delete.customers');

    Route::post('/dashboard', [TestController::class, 'updateOrCreateCustomerDashboard'])->name('create.customers');
    
    Route::get('/dashboard/{id}', [TestController::class, 'getCustomerDashboard'])->name('get.customers');
    
     Route::put('/dashboard/{id}', [TestController::class, 'updateOrCreateCustomerDashboard'])->name('update.customers');
    
    Route::get('/customer', [TestController::class, 'getCustomer'])->name('get.customers');
    
    Route::post('/customer-filter', [TestController::class, 'getCustomerFilter']);

    
    Route::delete('/register/{id}', [TestController::class,'deleteEmployeesRegister'])->name('delete.employees');
    
    Route::post('/register', [TestController::class, 'updateOrCreateEmployeesRegister'])->name('create.employees');
    
    Route::get('/register/{employees}', [TestController::class, 'getEmployeesRegister'])->name('get.employees');
    
    Route::put('/register/{id}', [TestController::class, 'updateOrCreateEmployeesRegister'])->name('update.employees');
    
    Route::get('/employees', [TestController::class, 'getEmployees'])->name('get.employees');
    
    Route::post('/employees-filter', [TestController::class, 'getEmployeesFilter']);
    
    Route::post('/employees-filter-all', [TestController::class, 'getEmployeesFilterAll']);
    
    
    
    Route::delete('/branch/{id}', [TestController::class,'deleteBranchesBranch'])->name('delete.branches');
    
    Route::post('/branch', [TestController::class, 'updateOrCreateBranchesBranch'])->name('create.branches');
    
    Route::get('/branch/{id}', [TestController::class, 'getBranchesBranch'])->name('get.branches');
    
    Route::put('/branch/{id}', [TestController::class, 'updateOrCreateBranchesBranch'])->name('update.branches');
    
    Route::get('/branches', [TestController::class, 'getBranches'])->name('get.branches');
    
    Route::post('/branches-filter', [TestController::class, 'getBranchesFilter']);
    
    Route::post('/branches-filter-all', [TestController::class, 'getBranchesFilterAll']);
    
    
    
    Route::delete('/pay/{id}', [TestController::class,'deletePaysPay'])->name('delete.pays');
    
    Route::post('/pay', [TestController::class, 'updateOrCreatePaysPay'])->name('create.pays');
    
    Route::get('/pay/{id}', [TestController::class, 'getPaysPay'])->name('get.pays');
    
    Route::put('/pay/{id}', [TestController::class, 'updateOrCreatePaysPay'])->name('update.pays');
    
    Route::get('/pays', [TestController::class, 'getPays'])->name('get.pays');
    
    Route::post('/pays-filter', [TestController::class, 'getPaysFilter']);
    
    Route::post('/pays-filter-all', [TestController::class, 'getPaysFilterAll']);
    
    
    
    Route::delete('/bill/{id}', [TestController::class,'deleteBillsBill'])->name('delete.bills');
    
    Route::post('/bill', [TestController::class, 'updateOrCreateBillsBill'])->name('create.bills');
    
    Route::get('/bill/{bill}', [TestController::class, 'getBillsBill'])->name('get.bills');
    
    Route::put('/bill/{id}', [TestController::class, 'updateOrCreateBillsBill'])->name('update.bills');
    
    Route::get('/bills', [TestController::class, 'getBills'])->name('get.bills');
    
    Route::post('/bills-filter', [TestController::class, 'getBillsFilter']);
    
    Route::post('/bills-filter-all', [TestController::class, 'getBillsFilterAll']);
    
    
    Route::delete('/users/{id}', [TestController::class,'deleteUserUsers'])->name('delete.user');
    
    Route::post('/users', [TestController::class, 'updateOrCreateUserUsers'])->name('create.user');
    
    Route::get('/users/{user}', [TestController::class, 'getUser'])->name('get.user');
    
    Route::put('/users/{id}', [TestController::class, 'updateOrCreateUserUsers'])->name('update.user');
    
    Route::get('/user', [TestController::class, 'getUsers'])->name('get.user');
    
    Route::post('/users-filter', [TestController::class, 'getUsersFilter']);
    
    Route::post('/users-filter-all', [TestController::class, 'getUsersFilterAll']);
    
    
    Route::delete('/contact/{id}', [TestController::class,'deleteContactsContact'])->name('delete.contacts');
    
    Route::post('/contact', [TestController::class, 'updateOrCreateContactsContact'])->name('create.contacts');
    
    Route::get('/contact/{contact}', [TestController::class, 'getContactsContact'])->name('get.contacts');
    
    Route::put('/contact/{id}', [TestController::class, 'updateOrCreateContactsContact'])->name('update.contacts');
    
    Route::get('/contacts', [TestController::class, 'getContacts'])->name('get.contacts');
    
    Route::post('/contacts-filter', [TestController::class, 'getContactsFilter']);
    
    Route::post('/contacts-filter-all', [TestController::class, 'getContactsFilterAll']);
    
    
    
    Route::delete('/cars/{id}', [TestController::class,'deleteCars'])->name('delete.cars');
    
    Route::post('/cars', [TestController::class, 'updateOrCreateCars'])->name('create.cars');
    
    Route::get('/cars/{cars}', [TestController::class, 'getCars'])->name('get.cars');
    
    Route::put('/cars/{id}', [TestController::class, 'updateOrCreateCars'])->name('update.cars');
    
    Route::get('/cars', [TestController::class, 'getCarss'])->name('get.cars');
    
    Route::post('/cars-filter', [TestController::class, 'getCarsFilter']);
    
    Route::post('/cars-filter-all', [TestController::class, 'getCarsFilterAll']);
    
    
    
    Route::delete('/expenses/{id}', [TestController::class,'deleteExpenses'])->name('delete.expenses');
    
    Route::post('/expenses', [TestController::class, 'updateOrCreateExpenses'])->name('create.expenses');
    
    Route::get('/expenses/{id}', [TestController::class, 'getExpenses'])->name('get.expenses');
    
    Route::put('/expenses/{id}', [TestController::class, 'updateOrCreateExpenses'])->name('update.expenses');
    
    Route::get('/expenses', [TestController::class, 'getExpensess'])->name('get.expenses');
    
    Route::post('/expenses-filter', [TestController::class, 'getExpensesFilter']);
    
    Route::post('/expenses-filter-all', [TestController::class, 'getExpensesFilterAll']);
    
    
    
    Route::delete('/bill_detail/{id}', [TestController::class,'deleteBill_detail'])->name('delete.bill_detail');
    
    Route::post('/bill_detail', [TestController::class, 'updateOrCreateBill_detail'])->name('create.bill_detail');
    
    Route::get('/bill_detail/{id}', [TestController::class, 'getBill_detail'])->name('get.bill_detail');
    
    Route::put('/bill_detail/{id}', [TestController::class, 'updateOrCreateBill_detail'])->name('update.bill_detail');
    
    Route::get('/bill_detail', [TestController::class, 'getBill_detail'])->name('get.bill_detail');
    
    Route::post('/bill_detail-filter-all', [TestController::class, 'getBill_detailFilterAll']);
    
    
    Route::delete('/notes/{id}', [TestController::class,'deleteNotes'])->name('delete.notes');
    
    Route::post('/notes', [TestController::class, 'updateOrCreateNotes'])->name('create.notes');
    
    Route::get('/notes/{id}', [TestController::class, 'getNotes'])->name('get.notes');
    
    Route::put('/notes/{id}', [TestController::class, 'updateOrCreateNotes'])->name('update.notes');
    
    Route::get('/notes', [TestController::class, 'getNotes'])->name('get.notes');
    
    Route::post('/notes-filter-all', [TestController::class, 'getNotesFilterAll']);
    
    Route::post('/transfer', [TestController::class, 'updateTransfer']);
});












/* Route::middleware('auth:sanctum')->group(function () {

    Route::post('/dashboard', [TestController::class, 'updateOrCreateCustomersDashboard'])->name('update.customer');

    Route::delete('/dashboard/{id}', [TestController::class, 'deleteCustomersDashboard'])->name('delete.customer');
        
    Route::get('/dashboard/{id}' , [TestController::class, 'getCustomersDashboard'])->name('get.customer');

});
 */