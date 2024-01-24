<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/invoices', function () {
    $invoices = DB::table('invoices')
        ->join('customers', 'invoices.CustomerId', '=', 'customers.CustomerId')
        ->orderBy('invoices.InvoiceDate', 'DESC')
        ->get();

    // dd($invoices);

    return view('invoices', [
        'invoices' => $invoices,
        'invoiceCount' => count($invoices),
    ]);
});
