@extends('layouts.guest.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4 shadow-sm">

            <h6 class="mb-3 text-white border-bottom pb-2">Tambah Data Peristiwa Kelahiran</h6>

            <form action="{{ route('peristiwa_kelahiran.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- WARGA & TANGGAL --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label text-white">Warga (Anak)</label>
                        <select name="warga_id" class="form-control bg-white text-black" required>
                            <option value="">-- Pilih Warga --</option>
                            @foreach ($warga as $w)
                                <option value="{{ $w->warga_id }}" {{ old('warga_id') == $w->warga_id ? 'selected' : '' }}>
                                    {{ $w->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label text-white">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir"
                            class="form-control bg-dark text-white border-0 rounded-3 p-2" value="{{ old('tgl_lahir') }}"
                            required>
                    </div>
                </div>

                {{-- TEMPAT + ORANG TUA --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label text-white">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir"
                            class="form-control bg-dark text-white border-0 rounded-3 p-2" value="{{ old('tempat_lahir') }}"
                            required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label text-white">Ayah</label>
                        <select name="ayah_warga_id" class="form-control bg-white text-black" required>
                            <option value="">-- Pilih Ayah --</option>
                            @foreach ($ayah as $a)
                                <option value="{{ $a->warga_id }}"
                                    {{ old('ayah_warga_id') == $a->warga_id ? 'selected' : '' }}>
                                    {{ $a->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label text-white">Ibu</label>
                        <select name="ibu_warga_id" class="form-control bg-white text-black" required>
                            <option value="">-- Pilih Ibu --</option>
                            @foreach ($ibu as $i)
                                <option value="{{ $i->warga_id }}"
                                    {{ old('ibu_warga_id') == $i->warga_id ? 'selected' : '' }}>
                                    {{ $i->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- AKTA --}}
                <div class="mb-3">
                    <label class="form-label text-white">Nomor Akta</label>
                    <input type="text" name="no_akta" class="form-control bg-dark text-white border-0 rounded-3 p-2"
                        value="{{ old('no_akta') }}" required>
                </div>

                {{-- FILE --}}
                <div class="mb-3">
                    <label class="form-label text-white">File Pendukung</label>
                    <input type="file" name="file_pendukung[]"
                        class="form-control bg-dark text-white border-0 rounded-3 p-2" multiple>
                </div>

                <button class="btn btn-primary px-4">Simpan</button>
                <a href="{{ route('peristiwa_kelahiran.index') }}" class="btn btn-outline-light px-4">Kembali</a>
            </form>

        </div>
    </div>
@endsection
