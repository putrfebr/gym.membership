@extends('layouts.kai')  

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Tambah Membership</h3>
    </div>
    <div class="card-body">
        <form action="/membership" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama Membership</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="monthly_price">Harga</label>
                <input type="number" class="form-control" id="monthly_price" name="monthly_price">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection