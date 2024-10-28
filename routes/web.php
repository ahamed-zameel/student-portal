<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SubjectController;


// Route::get('', [ProductController::class, 'index']); 
 

// Route::get('product-add', [ProductController::class, 'productadd'])->name('product.add');
// Route::post('product-add', [ProductController::class, 'productadd'])->name('product.add');






Route::match(['get', 'post'], '/product-add', [ProductController::class, 'productadd'])->name('product.add');


Route::get('/product-list', [ProductController::class, 'productList'])->name('product.list');

Route::get('/products', [ProductController::class, 'productList'])->name('product.list');
Route::get('/product-add', [ProductController::class, 'productadd'])->name('product.add');
Route::get('/product-edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/product-update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product-delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');


// //sales
Route::match(['get', 'post'], '/sales-add', [saleController::class, 'salesadd'])->name('sales.add');
Route::get('/sales-list', [SaleController::class, 'salesList'])->name('sales.list');
Route::get('/sales-add', [SaleController::class, 'salesadd'])->name('sales.add');
Route::delete('/sales-delete/{id}', [SaleController::class, 'destroy'])->name('sales.delete');

Route::get('export', [SaleController::class, 'export'])->name('export');

Route::get('import', [SaleController::class, 'Importview'])->name('import_view');
Route::post('import', [SaleController::class, 'Import'])->name('import');


//login

Route::get('signup', [LoginController::class, 'Signup'])->name('signup');
Route::post('signup', [LoginController::class, 'AddSignup'])->name('signup');

Route::get('', [LoginController::class, 'Login']);
Route::post('login', [LoginController::class, 'AddLogin'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

//subject

Route::get('subject-list', [SubjectController::class, 'SubList'])->name('subject');
Route::get('bed-list', [SubjectController::class, 'BedList'])->name('bed-list');
Route::get('bed-add', [SubjectController::class, 'create'])->name('subjects.create');
Route::post('bed-add', [SubjectController::class, 'store'])->name('subjects.store');
Route::delete('/subjects/{id}', [SubjectController::class, 'destroy'])->name('subjects.destroy');


//ctet

Route::get('ctet-list', [SubjectController::class, 'CtetList'])->name('ctet-list');
Route::get('ctet-add', [SubjectController::class, 'createStore'])->name('ctet.create');
Route::post('ctet-add', [SubjectController::class, 'storeCreate'])->name('ctet.store');
Route::delete('/ctets/{id}', [SubjectController::class, 'destroyid'])->name('ctets.destroy');

