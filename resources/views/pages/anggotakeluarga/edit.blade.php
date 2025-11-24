@extends('layouts.guest.app')

@section('content')
    <div class="container text-white">
        <h2 class="mb-4">Edit Anggota Keluarga</h2>

        <form action="{{ route('anggota_keluarga.update', $anggota->anggota_id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Pilih Nomor KK --}}
            <div class="mb-3">
                <label for="kk_id" class="form-label">Nomor KK</label>
                <select name="kk_id" id="kk_id" class="form-select" required>
                    <option value="">-- Pilih Nomor KK --</option>
                    @foreach ($keluargaKK as $kk)
                        <option value="{{ $kk->kk_id }}" {{ $kk->kk_id == $anggota->kk_id ? 'selected' : '' }}>
                            {{ $kk->kk_nomor }} - {{ $kk->kepalaKeluarga?->nama ?? 'Tidak diketahui' }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Pilih Nama Warga --}}
            <div class="mb-3">
                <label for="warga_id" class="form-label">Nama Warga</label>
                <select name="warga_id" id="warga_id" class="form-select" required>
                    <option value="">-- Pilih Nama Warga --</option>
                    @foreach ($warga as $w)
                        <option value="{{ $w->warga_id }}" {{ $w->warga_id == $anggota->warga_id ? 'selected' : '' }}>
                            {{ $w->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Input Hubungan --}}
            <div class="mb-3">
                <label for="hubungan" class="form-label">Hubungan</label>
                <input type="text" name="hubungan" id="hubungan" class="form-control"
                    value="{{ $anggota->hubungan }}" required>
            </div>

            {{-- Tombol Aksi --}}
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('anggota_keluarga.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
@endsection
