<?php

namespace App\Http\Controllers;

use App\Models\InvoicePembayaran;
use Illuminate\Http\Request;

class InvoicePembayaranController extends Controller
{
    public function index()
    {
        $invoicepembayaran = InvoicePembayaran::get();
        return view('invoicepembayaran.index', compact('invoicepembayaran',));
    }
}
