<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $primaryKey = 'InvoiceId';

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'CustomerId');
    }

    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class, 'InvoiceId', 'InvoiceId');
    }
}
