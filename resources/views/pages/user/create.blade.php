@extends('layouts.guest.app')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded p-4">
        <h6 class="mb-4">Tambah Data User</h6>

        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ old('name') }}" placeholder="Masukkan nama" required>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control"
                           value="{{ old('email') }}" placeholder="Masukkan email" required>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control"
                           placeholder="Masukkan password" required>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control"
                           placeholder="Ulangi password" required>
                </div>
            </div>

            {{-- INPUT FOTO MEDIA --}}
            <div class="mb-3">
                <label>Foto Profil (Media)</label>
                <input type="file" name="photo" class="form-control" accept="image/*" required>
                <small class="text-muted">Upload foto profil user</small>
                @error('photo')
                    <small class="text-danger d-block">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
