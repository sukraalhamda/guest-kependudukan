@extends('layouts.guest.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <h6 class="mb-4 text-white">Edit Data User</h6>

            <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- NAMA & EMAIL --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label text-white">Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}"
                            required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label text-white">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}"
                            required>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                {{-- PASSWORD --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label text-white">Password Baru (Opsional)</label>
                        <input type="password" name="password" class="form-control"
                            placeholder="Kosongkan jika tidak diubah">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label text-white">Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Ulangi password baru">
                    </div>
                </div>

                {{-- ROLE --}}
                <div class="mb-3">
                    <label class="form-label text-white">Role</label>
                    <select name="role" class="form-control" required>
                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                    </select>
                    @error('role')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- FOTO PROFIL LAMA --}}
                @php
                    $photo = \App\Models\Media::where('ref_table', 'users')->where('ref_id', $user->id)->first();
                @endphp

                @if ($photo)
                    <div class="mb-3">
                        <label class="form-label text-white">Foto Profil Saat Ini:</label><br>
                        <img src="{{ asset('storage/' . $photo->file_name) }}"
                            style="width:100px; height:100px; object-fit:cover; border-radius:10px;">
                    </div>
                @endif

                {{-- UPLOAD FOTO --}}
                <div class="mb-3">
                    <label class="form-label text-white">Foto Profil (Opsional)</label>
                    <input type="file" name="photo" class="form-control" accept="image/*">
                    @error('photo')
                        <small class="text-danger d-block">{{ $message }}</small>
                    @enderror
                </div>

                {{-- BUTTON --}}
                <button type="submit" class="btn btn-primary">Perbarui</button>
                <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
