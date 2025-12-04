@extends('layouts.guest.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">

            <h6 class="mb-4 text-white">Edit Peristiwa Kelahiran</h6>

            <form action="{{ route('peristiwa_kelahiran.update', $kelahiran->kelahiran_id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- ===== FORM DATA ===== --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="text-white">ID Warga</label>
                        <input type="number" name="warga_id" class="form-control"
                            value="{{ old('warga_id', $kelahiran->warga_id) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="text-white">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control"
                            value="{{ old('tgl_lahir', $kelahiran->tgl_lahir) }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="text-white">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control"
                            value="{{ old('tempat_lahir', $kelahiran->tempat_lahir) }}" required>
                    </div>

                    <div class="col-md-3">
                        <label class="text-white">ID Ayah</label>
                        <input type="number" name="ayah_warga_id" class="form-control"
                            value="{{ old('ayah_warga_id', $kelahiran->ayah_warga_id) }}" required>
                    </div>

                    <div class="col-md-3">
                        <label class="text-white">ID Ibu</label>
                        <input type="number" name="ibu_warga_id" class="form-control"
                            value="{{ old('ibu_warga_id', $kelahiran->ibu_warga_id) }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="text-white">Nomor Akta</label>
                    <input type="text" name="no_akta" class="form-control"
                        value="{{ old('no_akta', $kelahiran->no_akta) }}" required>
                </div>


                {{-- ===== FILE PENDUKUNG LAMA ===== --}}
                @if ($kelahiran->file_pendukung)
                    <div class="mb-4">
                        <label class="text-white fw-bold mb-2">File Pendukung Saat Ini:</label>

                        {{-- jika Gambar --}}
                        @if (preg_match('/\.(jpg|jpeg|png)$/i', $kelahiran->file_pendukung))
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $kelahiran->file_pendukung) }}" alt="file lama"
                                    class="rounded" style="max-height: 200px; object-fit: cover;">
                            </div>
                        @else
                            {{-- jika PDF / dokumen --}}
                            <a href="{{ asset('storage/' . $kelahiran->file_pendukung) }}" class="btn btn-outline-info btn-sm"
                                target="_blank">
                                📎 Lihat File Pendukung
                            </a>
                        @endif
                    </div>
                @endif


                {{-- ===== Upload Baru ===== --}}
                <div class="mb-3">
                    <label class="text-white">Ganti File Pendukung (Opsional)</label>
                    <input type="file" name="file_pendukung" class="form-control">
                    <small class="text-light">Kosongkan jika tidak ingin mengganti</small>
                </div>

                <button type="submit" class="btn btn-primary">Perbarui</button>
                <a href="{{ route('peristiwa_kelahiran.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>
@endsection
