@extends('layouts.guest.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4 shadow-sm">

            <h6 class="mb-3 text-white border-bottom pb-2">Edit Peristiwa Pindah</h6>

            <form action="{{ route('peristiwa_pindah.update', $data->pindah_id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label text-white">Warga</label>
                        <select name="warga_id" class="form-control bg-white" required>
                            @foreach ($warga as $w)
                                <option value="{{ $w->warga_id }}" {{ $w->warga_id == $data->warga_id ? 'selected' : '' }}>
                                    {{ $w->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label text-white">Tanggal Pindah</label>
                        <input type="date" name="tgl_pindah" value="{{ $data->tgl_pindah }}"
                            class="form-control bg-white" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Alamat Tujuan</label>
                    <input type="text" name="alamat_tujuan" value="{{ $data->alamat_tujuan }}"
                        class="form-control bg-white" required>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label text-white">Kecamatan Tujuan</label>
                        <input type="text" name="kecamatan_tujuan" value="{{ $data->kecamatan_tujuan }}"
                            class="form-control bg-white">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-white">Kabupaten Tujuan</label>
                        <input type="text" name="kabupaten_tujuan" value="{{ $data->kabupaten_tujuan }}"
                            class="form-control bg-white">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label text-white">Provinsi Tujuan</label>
                        <input type="text" name="provinsi_tujuan" value="{{ $data->provinsi_tujuan }}"
                            class="form-control bg-white">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-white">Negara Tujuan</label>
                        <input type="text" name="negara_tujuan" value="{{ $data->negara_tujuan ?? 'Indonesia' }}"
                            class="form-control bg-white">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Alasan</label>
                    <input type="text" name="alasan" value="{{ $data->alasan }}" class="form-control bg-white">
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Keterangan</label>
                    <textarea name="keterangan" class="form-control bg-white" rows="3">{{ $data->keterangan }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Status</label>
                    <select name="status" class="form-control bg-white">
                        <option value="pending" {{ $data->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="approved" {{ $data->status == 'approved' ? 'selected' : '' }}>Approved</option>
                        <option value="rejected" {{ $data->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">No Surat</label>
                    <input type="text" name="no_surat" value="{{ $data->no_surat }}" class="form-control bg-white">
                </div>

                {{-- MEDIA LAMA --}}
                @if ($data->media->count())
                    <div class="mb-3">
                        <label class="form-label text-white">Dokumen Saat Ini</label>
                        @foreach ($data->media as $m)
                            <div class="form-check text-white">
                                <input type="checkbox" name="delete_media[]" value="{{ $m->media_id }}"
                                    class="form-check-input">
                                <a href="{{ asset('storage/' . $m->file_name) }}" target="_blank" class="text-info ms-2">
                                    {{ basename($m->file_name) }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="mb-3">
                    <label class="form-label text-white">Upload Bukti Baru</label>
                    <input type="file" name="file[]" multiple class="form-control bg-white">
                </div>

                <button class="btn btn-primary px-4">Update</button>
                <a href="{{ route('peristiwa_pindah.index') }}" class="btn btn-outline-light px-4">Kembali</a>
            </form>
        </div>
    </div>
@endsection
