@extends('layouts.kai')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Data Member</h3>
            <a href="/member/create" class="btn btn-primary">Tambah Member</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Member</th>
                        <th>Membership</th>
                        <th>Tanggal Join</th>
                        <th>Alamat</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($members as $member)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->membership->name }}</td>
                            <td>{{ $member->join_date }}</td>
                            <td>{{ $member->address }}</td>
                            <td>{{ $member->phone }}</td>
                            <td>
                                @if(trim(strtolower($member->status)) == 'active')
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Suspend</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('member.edit', $member->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('member.destroy', $member->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus member ini?')">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection