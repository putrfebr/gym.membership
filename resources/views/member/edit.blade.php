@extends('layouts.kai')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Tambah Member</h3>
        </div>
        <div class="card-body">
            <form action="/member/{{  $member->id }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name">Nama Member</label>
                    <input type="text" class="form-control" name="name" value="{{ $member->name }}">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ $member->phone }}">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="address" class="form-control" value="{{ $member->address }}"></textarea>
                </div>
                <div class="form-group">
                    <label>Membership</label>
                    <select name="membership_id" class="form-control">
                        @foreach ($memberships as $membership)
                            <option value="{{ $membership->id }}"
                                {{ $member->membership_id == $membership->id ? 'selected' : '' }}>
                                {{ $membership->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Tanggal Join</label>
                    <input type="date" name="join_date" class="form-control" value="{{ $member->join_date }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0 ">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>
    </div>
@endsection