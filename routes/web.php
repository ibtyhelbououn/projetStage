<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\InvoiceController;


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

////
Route::get('/products',[ProductController::class,'index']);

Route::get('/add-product',[ProductController::class,'add']);
Route::post('/add-product',[ProductController::class,'store']);

Route::get('/edit-product/{product}',[ProductController::class,'edit']);
Route::put('/edit-product/{product}',[ProductController::class,'update']);

Route::delete('/delete-product/{product}',[ProductController::class,'delete']);



////
Route::get('/categories',[CategoryController::class,'index']);

Route::get('/add-category',[CategoryController::class,'add']);
Route::post('/add-category',[CategoryController::class,'store']);

Route::get('/edit-category/{category}',[CategoryController::class,'edit']);
Route::put('/edit-category/{category}',[CategoryController::class,'update']);

Route::delete('/delete-category/{category}',[CategoryController::class,'delete']);

////
Route::get('/organizations',[OrganizationController::class,'index']);

Route::get('/add-organization',[OrganizationController::class,'add']);
Route::post('/add-organization',[OrganizationController::class,'store']);

Route::get('/edit-organization/{organization}',[OrganizationController::class,'edit']);
Route::put('/edit-organization/{organization}',[OrganizationController::class,'update']);

Route::delete('/delete-organization/{organization}',[OrganizationController::class,'delete']);

///
Route::get('/invoices',[InvoiceController::class,'index']);
Route::get('/add-invoice',[InvoiceController::class,'add']);
Route::post('/add-invoice',[InvoiceController::class,'create']);
Route::delete('/delete-invoice/{invoice}',[InvoiceController::class,'delete']);
Route::get('/invoice-details/{invoice}',[InvoiceController::class,'details']);


Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/menu',function(){
    return view('menu');
});



///////////////////////////////////////////////////////////////




// Route::get('/add-invoice/{invoiceID}', 				[InvoiceController::class,'invoice']);
// Route::delete('add-invoice/{invoiceID}', 			[InvoiceController::class,'destroy']);
// Route::post('add-invoice/{invoiceID}', 			[InvoiceController::class,'addItem']);
// Route::delete('add-invoice/{invoiceID}/{productID}', [InvoiceController::class,'destroyItem']);
