@extends('layouts.kai')
@section('content')
<div class="container">
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h3>Data Membership</h3>
        <a href="/membership/create" class="btn btn-primary">Tambah Membership</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Membership</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($memberships as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>Rp {{ number_format($item->monthly_price) }}</td>
                    <td>
                        <a href="/membership/{{  $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>  
                        <form action="/membership/{{ $item->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection