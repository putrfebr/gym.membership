<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Member;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::with('member')->get();
        return view('invoice.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function generate()
    {
        $members = Member::where('status', 'suspend')->get();
        foreach($members as $member){
            //Cek apakah member sudah memiliki invoice
            $cek = Invoice::where('member_id', $member->id)
                ->whereMonth('invoice_date', date('m'))
                ->whereYear('invoice_date', date('Y'))
                ->exists();
            if($cek){
                continue;
            }
            $subtotal = $member->membership->monthly_price;
            $tax = $subtotal * 0.11;
            $total = $subtotal + $tax;
            //Nomor Invoice
            $lastInvoice = Invoice::latest()->first();
            if ($lastInvoice) {
                $lastNumber = (int) substr($lastInvoice->invoice_number, -5);
                $newNumber = $lastNumber + 1;
            } else {
                $newNumber = 1;
            }
            $invoiceNumber = "INV/".date('Y')."/".date('m')."/".str_pad($newNumber, 5, '0', STR_PAD_LEFT);
            Invoice::create([
                'member_id' => $member->id,
                'invoice_number' => $invoiceNumber,
                'invoice_date' => now()->toDateString(),
                'subtotal' => $subtotal,
                'tax' => $tax,
                'total' => $total,
                'status' => 'Unpaid'
            ]);
        }
        return redirect()->route('invoice.index')
            ->with('success', 'Invoice berhasil di generate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
