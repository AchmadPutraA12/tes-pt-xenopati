@extends('Layouts.Main')

@section('title', 'Edit Pegawai')

@section('content')
    <div class="container">
        <h2>Edit Pegawai</h2>
        <form action="{{ route('employee.update', $employee) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ old('name', $employee->name) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{ old('email', $employee->email) }}" required>
            </div>

            <div class="form-group">
                <label for="address">Alamat</label>
                <input type="text" class="form-control" id="address" name="address"
                    value="{{ old('address', $employee->address) }}" required>
            </div>

            <div class="form-group">
                <label for="phone">Telepon</label>
                <input type="text" class="form-control" id="phone" name="phone"
                    value="{{ old('phone', $employee->phone) }}" required>
            </div>

            <div class="form-group">
                <label for="user_picture">Foto</label>
                <input type="file" class="form-control" id="user_picture" name="user_picture">
                @if ($employee->user_picture)
                    <img src="{{ Storage::url($employee->user_picture) }}" alt="{{ $employee->name }}"
                        style="width: 100px; margin-top: 10px;">
                @endif
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="Isi jika ingin mengubah password">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
