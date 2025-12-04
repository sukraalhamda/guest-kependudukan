@extends('layouts.guest.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <h6 class="mb-4">Edit Data User</h6>

            <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}"
                            required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}"
                            required>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>Password Baru (opsional)</label>
                        <input type="password" name="password" class="form-control"
                            placeholder="Kosongkan jika tidak diubah">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label>Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Ulangi password baru">
                    </div>
                </div>
                {{-- FOTO PROFIL LAMA --}}
                @if ($user->media_photo)
                    <div class="mb-3">
                        <label class="fw-bold">Foto Profil Saat Ini:</label><br>
                        <a href="{{ asset('storage/' . $user->media_photo) }}" target="_blank">
                            <img src="{{ asset('storage/' . $user->media_photo) }}"
                                style="width:100px; height:100px; object-fit:cover; border-radius:10px; cursor:pointer;">
                        </a>
                    </div>
                @endif

                {{-- INPUT FILE --}}
                <div class="mb-3">
                    <label>Foto Profil</label>
                    <input type="file" name="photo" class="form-control">
                    <small class="text-muted">Upload foto profil (opsional)</small>

                    @error('photo')
                        <small class="text-danger d-block">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Perbarui</button>
                <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
