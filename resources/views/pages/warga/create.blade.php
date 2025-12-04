@extends('layouts.guest.app')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded p-4 shadow-sm">

        <h6 class="mb-3 text-white border-bottom pb-2">Tambah Data Warga</h6>

        <form action="{{ route('warga.store') }}" method="POST">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label text-white">NIK</label>
                    <input
                        type="text"
                        name="nik"
                        class="form-control bg-white text-black border-0 rounded-3 p-2"
                        placeholder="Masukkan NIK"
                        value="{{ old('nik') }}"
                        required>
                </div>
                <div class="col-md-6">
                    <label class="form-label text-white">Nama</label>
                    <input
                        type="text"
                        name="nama"
                        class="form-control bg-white text-black border-0 rounded-3 p-2"
                        placeholder="Masukkan nama"
                        value="{{ old('nama') }}"
                        required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label text-white">Jenis Kelamin</label>
                    <select name="jenis_kelamin"
                        class="form-select bg-white text-black border-0 rounded-3 p-2"
                        required>
                        <option value="">-- Pilih --</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label text-white">Tempat Lahir</label>
                    <input
                        type="text"
                        name="tempat_lahir"
                        class="form-control bg-white text-black border-0 rounded-3 p-2"
                        placeholder="Masukkan tempat lahir"
                        value="{{ old('tempat_lahir') }}"
                        required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label text-white">Tanggal Lahir</label>
                    <input
                        type="date"
                        name="tanggal_lahir"
                        class="form-control bg-white text-black border-0 rounded-3 p-2"
                        value="{{ old('tanggal_lahir') }}"
                        required>
                </div>

                <div class="col-md-6">
                    <label class="form-label text-white">Agama</label>
                    <input
                        type="text"
                        name="agama"
                        class="form-control bg-white text-black border-0 rounded-3 p-2"
                        placeholder="Masukkan agama"
                        value="{{ old('agama') }}"
                        required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label text-white">Pendidikan</label>
                    <input
                        type="text"
                        name="pendidikan"
                        class="form-control bg-white text-black border-0 rounded-3 p-2"
                        placeholder="Masukkan pendidikan"
                        value="{{ old('pendidikan') }}"
                        required>
                </div>
                <div class="col-md-6">
                    <label class="form-label text-white">Pekerjaan</label>
                    <input
                        type="text"
                        name="pekerjaan"
                        class="form-control bg-white text-black border-0 rounded-3 p-2"
                        placeholder="Masukkan pekerjaan"
                        value="{{ old('pekerjaan') }}"
                        required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label text-white">Status Perkawinan</label>
                    <select
                        name="status_perkawinan"
                        class="form-select bg-white text-black border-0 rounded-3 p-2"
                        required>
                        <option value="">-- Pilih --</option>
                        <option value="Belum Kawin">Belum Kawin</option>
                        <option value="Kawin">Kawin</option>
                        <option value="Cerai Hidup">Cerai Hidup</option>
                        <option value="Cerai Mati">Cerai Mati</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label text-white">Status Dalam Keluarga</label>
                    <input
                        type="text"
                        name="status_dalam_keluarga"
                        class="form-control bg-white text-black border-0 rounded-3 p-2"
                        placeholder="Contoh: Kepala Keluarga, Anak"
                        value="{{ old('status_dalam_keluarga') }}"
                        required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary px-4">Simpan</button>
            <a href="{{ route('warga.index') }}" class="btn btn-outline-light px-4">Kembali</a>

        </form>

    </div>
</div>
@endsection
