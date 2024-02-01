<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with(['customer'])->get();

        return view('invoices', [
            'invoices' => $invoices,
            'invoiceCount' => count($invoices),
        ]);
    }

    public function show($invoiceId)
    {
        $invoice = Invoice::with([
            'invoiceItems.track',
            'invoiceItems.track.album',
            'invoiceItems.track.album.artist',
        ])->find($invoiceId);

        return view('invoice', [
            'invoice' => $invoice,
        ]);
    }
}
