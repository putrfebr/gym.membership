<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;


class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::with('invoice.member')->get();
        return view('payment.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function pay($id)
    {
        $invoice = Invoice::findOrfail($id);
        Payment::create([
            'invoice_id' => $invoice->id,
            'payment_date' => now(),
            'amount' => $invoice->total,
        ]);
        $invoice->update([
            'status' => 'Paid'
        ]);
        $member = $invoice->member;
        $member->update([
            'status' => 'Active',
            'join_date' => Carbon::parse($member->join_date)->addMonth()
        ]);
        return redirect()->route('invoice.index');
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
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
