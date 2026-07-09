@extends('layouts.kai')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Data Invoice</h3>
            <a href="{{route('invoice.generate')}}" class="btn btn-primary">Generate Invoice</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Invoice</th>
                        <th>Member</th>
                        <th>Tanggal</th>
                        <th>Subtotal</th>
                        <th>Pajak</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoices as $invoice)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $invoice->invoice_number }}</td>
                            <td>{{ $invoice->member->name }}</td>
                            <td>{{ $invoice->invoice_date }}</td>
                            <td>Rp {{ number_format($invoice->subtotal) }}</td>
                            <td>Rp {{ number_format($invoice->tax) }}</td>
                            <td>Rp {{ number_format($invoice->total) }}</td>
                            <td>
                                @if($invoice->status == 'Paid')
                                    <span class="badge badge-success">Paid</span>
                                @else
                                    <span class="badge badge-danger">Unpaid</span>
                                @endif
                            </td>
                            <td>
                                @if($invoice->status == 'Unpaid')
                                    <form action="{{ route('payment.pay', $invoice->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">Bayar</button>
                                    </form>
                                @else
                                    <span class="badge bg-success">
                                        Sudah Dibayar
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection