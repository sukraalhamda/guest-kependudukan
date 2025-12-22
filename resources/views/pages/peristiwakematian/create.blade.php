@extends('layouts.guest.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4 shadow-sm">

            <h6 class="mb-3 text-white border-bottom pb-2">
                Tambah Peristiwa Kematian
            </h6>

            <form action="{{ route('peristiwa_kematian.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- WARGA & TANGGAL --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label text-white">Warga</label>
                        <select name="warga_id" class="form-control bg-white text-black" required>
                            <option value="">-- Pilih Warga --</option>
                            @foreach ($warga as $w)
                                <option value="{{ $w->warga_id }}" {{ old('warga_id') == $w->warga_id ? 'selected' : '' }}>
                                    {{ $w->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('warga_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label text-white">Tanggal Meninggal</label>
                        <input type="date" name="tgl_meninggal" value="{{ old('tgl_meninggal') }}"
                            class="form-control bg-white text-black" required>
                        @error('tgl_meninggal')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                {{-- SEBAB --}}
                <div class="mb-3">
                    <label class="form-label text-white">Sebab</label>
                    <input type="text" name="sebab" value="{{ old('sebab') }}"
                        class="form-control bg-white text-black" required>
                    @error('sebab')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- LOKASI --}}
                <div class="mb-3">
                    <label class="form-label text-white">Lokasi</label>
                    <input type="text" name="lokasi" value="{{ old('lokasi') }}"
                        class="form-control bg-white text-black" required>
                    @error('lokasi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- NO SURAT --}}
                <div class="mb-3">
                    <label class="form-label text-white">No Surat</label>
                    <input type="text" name="no_surat" value="{{ old('no_surat') }}"
                        class="form-control bg-white text-black">
                    @error('no_surat')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- FILE PENDUKUNG (INI YANG KRUSIAL) --}}
                <div class="mb-3">
                    <label class="form-label text-white">
                        Upload Bukti (Gambar / PDF)
                    </label>
                    <input type="file" name="file_pendukung[]" multiple class="form-control bg-white text-black">
                    <small class="text-light">
                        Format: JPG, PNG, PDF • Maks 5MB
                    </small>
                    @error('file_pendukung.*')
                        <small class="text-danger d-block">{{ $message }}</small>
                    @enderror
                </div>

                {{-- BUTTON --}}
                <div class="mt-4">
                    <button class="btn btn-primary px-4">
                        Simpan
                    </button>
                    <a href="{{ route('peristiwa_kematian.index') }}" class="btn btn-outline-light px-4">
                        Kembali
                    </a>
                </div>

            </form>
        </div>
    </div>
@endsection
