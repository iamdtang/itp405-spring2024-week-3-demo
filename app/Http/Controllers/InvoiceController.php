<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = DB::table('invoices')
            ->join('customers', 'invoices.CustomerId', '=', 'customers.CustomerId')
            ->orderBy('invoices.InvoiceDate', 'DESC')
            ->get();

        // dd($invoices);

        return view('invoices', [
            'invoices' => $invoices,
            'invoiceCount' => count($invoices),
        ]);
    }

    public function show($invoiceId)
    {
        $invoice = DB::table('invoices')
            ->where('InvoiceId', '=', $invoiceId)
            ->first();

        return view('invoice', [
            'invoice' => $invoice,
        ]);
    }
}
