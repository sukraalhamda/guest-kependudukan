@extends('layouts.guest.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">

            <h6 class="mb-3 text-white border-bottom pb-2">Edit Peristiwa Kematian</h6>

            <form action="{{ route('peristiwa_kematian.update', $kematian->kematian_id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label text-white">ID Warga</label>
                        <input type="number" name="warga_id" class="form-control bg-dark text-white border-0 rounded-3 p-2"
                            value="{{ old('warga_id', $kematian->warga_id) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label text-white">Tanggal Meninggal</label>
                        <input type="date" name="tgl_meninggal"
                            class="form-control bg-dark text-white border-0 rounded-3 p-2"
                            value="{{ old('tgl_meninggal', $kematian->tgl_meninggal) }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Sebab Kematian</label>
                    <input type="text" name="sebab" class="form-control bg-dark text-white border-0 rounded-3 p-2"
                        value="{{ old('sebab', $kematian->sebab) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Saksi (Opsional)</label>
                    <input type="text" name="saksi" class="form-control bg-dark text-white border-0 rounded-3 p-2"
                        value="{{ old('saksi', $kematian->saksi) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Nomor Surat</label>
                    <input type="text" name="no_surat" class="form-control bg-dark text-white border-0 rounded-3 p-2"
                        value="{{ old('no_surat', $kematian->no_surat) }}" required>
                </div>

                @if ($kematian->media->count())
                    <div class="mb-3">
                        <label class="form-label text-white fw-bold mb-2">Bukti Kematian Saat Ini:</label>
                        <div>
                            @php $file = $kematian->media->first(); @endphp

                            @if (preg_match('/\.(jpg|jpeg|png)$/i', $file->file_name))
                                <img src="{{ asset('storage/' . $file->file_name) }}" class="rounded"
                                    style="max-height:120px;">
                            @else
                                <a href="{{ asset('storage/' . $file->file_name) }}" target="_blank"
                                    class="btn btn-outline-info btn-sm">📎 Lihat File</a>
                            @endif
                        </div>
                    </div>
                @endif

                <div class="mb-3">
                    <label class="form-label text-white">Ganti Bukti (Opsional)</label>
                    <input type="file" name="bukti_kematian"
                        class="form-control bg-dark text-white border-0 rounded-3 p-2">
                    <small class="text-light">Max 2MB</small>
                </div>

                <button type="submit" class="btn btn-primary px-4">Perbarui</button>
                <a href="{{ route('peristiwa_kematian.index') }}" class="btn btn-secondary px-4">Kembali</a>

            </form>

        </div>
    </div>
@endsection
