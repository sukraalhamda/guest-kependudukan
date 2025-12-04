@extends('layouts.guest.app')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded p-4 shadow-sm">

        <h6 class="mb-3 text-white border-bottom pb-2">Tambah Data Keluarga KK</h6>

        <form action="{{ route('keluargakk.store') }}" method="POST">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label text-white">Nomor KK</label>
                    <input
                        type="text"
                        name="kk_nomor"
                        class="form-control bg-white text-black border-0 rounded-3 p-2"
                        value="{{ old('kk_nomor') }}"
                        placeholder="Masukkan nomor KK"
                        required>
                </div>

                <div class="col-md-6">
                    <label class="form-label text-white">ID Kepala Keluarga</label>
                    <input
                        type="number"
                        name="kepala_keluarga_warga_id"
                        class="form-control bg-white text-black border-0 rounded-3 p-2"
                        value="{{ old('kepala_keluarga_warga_id') }}"
                        placeholder="Masukkan ID kepala keluarga"
                        required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label text-white">Alamat</label>
                    <input
                        type="text"
                        name="alamat"
                        class="form-control bg-white text-black border-0 rounded-3 p-2"
                        value="{{ old('alamat') }}"
                        placeholder="Masukkan alamat"
                        required>
                </div>

                <div class="col-md-3">
                    <label class="form-label text-white">RT</label>
                    <input
                        type="text"
                        name="rt"
                        class="form-control bg-white text-black border-0 rounded-3 p-2"
                        value="{{ old('rt') }}"
                        placeholder="RT"
                        maxlength="5"
                        required>
                </div>

                <div class="col-md-3">
                    <label class="form-label text-white">RW</label>
                    <input
                        type="text"
                        name="rw"
                        class="form-control bg-white text-black border-0 rounded-3 p-2"
                        value="{{ old('rw') }}"
                        placeholder="RW"
                        maxlength="5"
                        required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary px-4">Simpan</button>
            <a href="{{ route('keluargakk.index') }}" class="btn btn-outline-light px-4">Kembali</a>

        </form>

    </div>
</div>
@endsection
