@extends('layouts.guest.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4 shadow-sm">

            <h6 class="mb-3 text-white border-bottom pb-2">Tambah Data Peristiwa Kematian</h6>

            <form action="{{ route('peristiwa_kematian.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label text-white">ID Warga</label>
                        <input type="number" name="warga_id" class="form-control bg-dark text-white border-0 rounded-3 p-2"
                            value="{{ old('warga_id') }}" placeholder="Masukkan ID warga" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label text-white">Tanggal Meninggal</label>
                        <input type="date" name="tgl_meninggal"
                            class="form-control bg-dark text-white border-0 rounded-3 p-2"
                            value="{{ old('tgl_meninggal') }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Sebab Kematian</label>
                    <input type="text" name="sebab" class="form-control bg-dark text-white border-0 rounded-3 p-2"
                        value="{{ old('sebab') }}" placeholder="Masukkan sebab" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Saksi (Opsional)</label>
                    <input type="text" name="saksi" class="form-control bg-dark text-white border-0 rounded-3 p-2"
                        value="{{ old('saksi') }}" placeholder="Nama saksi(boleh kosong)">
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Nomor Surat</label>
                    <input type="text" name="no_surat" class="form-control bg-dark text-white border-0 rounded-3 p-2"
                        value="{{ old('no_surat') }}" placeholder="Masukkan nomor surat" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Bukti Kematian (jpg, png, pdf)</label>
                    <input type="file" name="bukti_kematian"
                        class="form-control bg-dark text-white border-0 rounded-3 p-2">
                    <small class="text-light">Opsional. Max 2MB.</small>
                </div>

                <button type="submit" class="btn btn-success px-4">Simpan</button>
                <a href="{{ route('peristiwa_kematian.index') }}" class="btn btn-outline-light px-4">Kembali</a>

            </form>

        </div>
    </div>
@endsection
