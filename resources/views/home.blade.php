@extends('layouts.kai')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <h5>Total Member</h5>
            <h2>{{ $totalMember }}</h2>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <h5>Total Membership</h5>
            <h2>{{ $totalMembership }}</h2>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <h5>Total Invoice</h5>
            <h2>{{ $totalInvoice }}</h2>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <h5>Total Payment</h5>
            <h2>Rp {{number_format($totalPayment) ?? 0 }}</h2>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection