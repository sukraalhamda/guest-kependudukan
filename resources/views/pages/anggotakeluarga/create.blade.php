@extends('layouts.guest.app')

@section('content')
    <div class="container">
        <h2>Tambah Anggota Keluarga</h2>

        <form action="{{ route('anggota_keluarga.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="kk_id" class="form-label">Nomor KK</label>
                <select name="kk_id" id="kk_id" class="form-select" required>
                    <option value="">-- Pilih Nomor KK --</option>
                    @foreach ($KeluargaKK as $kk)
                        <option value="{{ $kk->kk_id }}">
                            {{ $kk->kk_nomor }} - {{ $kk->kepalaKeluarga?->nama ?? 'Tidak diketahui' }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="warga_id" class="form-label">Nama Warga</label>
                <select name="warga_id" id="warga_id" class="form-select" required>
                    <option value="">-- Pilih Warga --</option>
                    @foreach ($warga as $w)
                        <option value="{{ $w->warga_id }}">{{ $w->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="hubungan" class="form-label">Hubungan</label>
                <input type="text" name="hubungan" id="hubungan" class="form-control" placeholder="Contoh: Ayah, Ibu, Anak" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('anggota_keluarga.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection

