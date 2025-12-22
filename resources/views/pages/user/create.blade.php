@extends('layouts.guest.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4 shadow-sm">

            <h6 class="mb-4 text-white">Tambah Data User</h6>

            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- NAMA & EMAIL --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label text-white">Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                            placeholder="Masukkan nama" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label text-white">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                            placeholder="Masukkan email" required>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                {{-- PASSWORD --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label text-white">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password"
                            required>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label text-white">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Ulangi password" required>
                    </div>
                </div>

                {{-- ROLE --}}
                <div class="mb-3">
                    <label class="form-label text-white">Role</label>
                    <select name="role" class="form-control" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>User</option>
                    </select>
                    <small class="text-muted d-block">Pilih <b>Admin</b> untuk akses penuh, <b>User</b> hanya melihat
                        data</small>
                    @error('role')
                        <small class="text-danger d-block">{{ $message }}</small>
                    @enderror
                </div>

                {{-- FOTO PROFIL --}}
                <div class="mb-3">
                    <label class="form-label text-white">Foto Profil (Opsional)</label>
                    <input type="file" name="photo" class="form-control" accept="image/*">
                    <small class="text-muted d-block">Upload foto profil user (jpg, jpeg, png)</small>
                    @error('photo')
                        <small class="text-danger d-block">{{ $message }}</small>
                    @enderror
                </div>

                {{-- BUTTON --}}
                <div class="mt-4">
                    <button type="submit" class="btn btn-success px-4">Simpan</button>
                    <a href="{{ route('user.index') }}" class="btn btn-secondary px-4">Kembali</a>
                </div>

            </form>
        </div>
    </div>
@endsection
