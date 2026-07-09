@extends('layouts.kai')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Data Pembayaran</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Member</th>
                        <th>No Invoice</th>
                        <th>Tanggal Bayar</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $payment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $payment->invoice->member->name }}</td>
                            <td>{{ $payment->invoice->invoice_number }}</td>
                            <td>{{ $payment->payment_date }}</td>
                            <td>Rp {{ number_format($payment->amount) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection