@extends('layouts.kai')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Edit Membership</h3>
    </div>
    <div class="card-body">
        <form action="/membership/{{  $membership->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
               <label>Nama Membership</label>
               <input type="text" class="form-control" name="name" value="{{ $membership->name }}">
            </div>
            <div class="mb-3">
                 <label>Deskripsi</label>
               <input type="text" class="form-control" name="description" value="{{ $membership->description }}"></textarea>
            </div>
            <div class="mb-3">
                 <label>Harga</label>
               <input type="number" class="form-control" name="monthly_price" value="{{ $membership->monthly_price }}"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button> 
        </form>
    </div>
</div>
@endsection