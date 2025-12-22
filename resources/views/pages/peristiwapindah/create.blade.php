@extends('layouts.guest.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4 shadow-sm">

            <h6 class="mb-3 text-white border-bottom pb-2">Tambah Peristiwa Pindah</h6>

            <form action="{{ route('peristiwa_pindah.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label text-white">Warga</label>
                        <select name="warga_id" class="form-control bg-white" required>
                            <option value="">-- Pilih Warga --</option>
                            @foreach ($warga as $w)
                                <option value="{{ $w->warga_id }}">{{ $w->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label text-white">Tanggal Pindah</label>
                        <input type="date" name="tgl_pindah" class="form-control bg-white" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Alamat Tujuan</label>
                    <input type="text" name="alamat_tujuan" class="form-control bg-white" required>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label text-white">Kecamatan Tujuan</label>
                        <input type="text" name="kecamatan_tujuan" class="form-control bg-white">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-white">Kabupaten Tujuan</label>
                        <input type="text" name="kabupaten_tujuan" class="form-control bg-white">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label text-white">Provinsi Tujuan</label>
                        <input type="text" name="provinsi_tujuan" class="form-control bg-white">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-white">Negara Tujuan</label>
                        <input type="text" name="negara_tujuan" class="form-control bg-white" value="Indonesia">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Alasan</label>
                    <input type="text" name="alasan" class="form-control bg-white">
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Keterangan</label>
                    <textarea name="keterangan" class="form-control bg-white" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Status</label>
                    <select name="status" class="form-control bg-white">
                        <option value="pending" selected>Pending</option>
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">No Surat</label>
                    <input type="text" name="no_surat" class="form-control bg-white">
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Upload Bukti (gambar / pdf)</label>
                    <input type="file" name="file[]" multiple class="form-control bg-white">
                </div>

                <button class="btn btn-primary px-4">Simpan</button>
                <a href="{{ route('peristiwa_pindah.index') }}" class="btn btn-outline-light px-4">Kembali</a>
            </form>
        </div>
    </div>
@endsection
