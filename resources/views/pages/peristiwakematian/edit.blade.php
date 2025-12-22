@extends('layouts.guest.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4 shadow-sm">

            <h6 class="mb-3 text-white border-bottom pb-2">
                Edit Peristiwa Kematian
            </h6>

            <form action="{{ route('peristiwa_kematian.update', $kematian->kematian_id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- WARGA & TANGGAL --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label text-white">Warga</label>
                        <select name="warga_id" class="form-control bg-white text-black" required>
                            @foreach ($warga as $w)
                                <option value="{{ $w->warga_id }}"
                                    {{ $w->warga_id == $kematian->warga_id ? 'selected' : '' }}>
                                    {{ $w->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label text-white">Tanggal Meninggal</label>
                        <input type="date" name="tgl_meninggal" class="form-control bg-white text-black"
                            value="{{ $kematian->tgl_meninggal }}" required>
                    </div>
                </div>

                {{-- SEBAB --}}
                <div class="mb-3">
                    <label class="form-label text-white">Sebab</label>
                    <input type="text" name="sebab" class="form-control bg-white text-black"
                        value="{{ $kematian->sebab }}" required>
                </div>

                {{-- LOKASI --}}
                <div class="mb-3">
                    <label class="form-label text-white">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control bg-white text-black"
                        value="{{ $kematian->lokasi }}" required>
                </div>

                {{-- NO SURAT --}}
                <div class="mb-3">
                    <label class="form-label text-white">No Surat</label>
                    <input type="text" name="no_surat" class="form-control bg-white text-black"
                        value="{{ $kematian->no_surat }}">
                </div>

                {{-- MEDIA LAMA --}}
                @if ($kematian->media->count())
                    <div class="mb-3">
                        <label class="form-label text-white">
                            Dokumen / Gambar Tersimpan
                        </label>

                        <div class="bg-dark rounded p-2">
                            @foreach ($kematian->media as $media)
                                <div class="form-check d-flex align-items-center mb-1">
                                    <input class="form-check-input me-2" type="checkbox" name="delete_media[]"
                                        value="{{ $media->media_id }}">

                                    <a href="{{ asset('storage/' . $media->file_name) }}" target="_blank"
                                        class="text-info me-2">
                                        @if (preg_match('/\.(jpg|jpeg|png)$/i', $media->file_name))
                                            🖼️
                                        @else
                                            📄
                                        @endif
                                    </a>

                                    <span class="text-light small">
                                        {{ basename($media->file_name) }}
                                    </span>
                                </div>
                            @endforeach
                        </div>

                        <small class="text-warning">
                            ✔ Centang untuk menghapus media
                        </small>
                    </div>
                @endif

                {{-- UPLOAD MEDIA BARU --}}
                <div class="mb-3">
                    <label class="form-label text-white">
                        Upload Bukti Baru (Opsional)
                    </label>
                    <input type="file" name="file_pendukung[]" multiple class="form-control bg-white text-black">
                    <small class="text-light">
                        JPG, PNG, PDF • Maks 5MB
                    </small>
                </div>

                {{-- BUTTON --}}
                <div class="mt-4">
                    <button class="btn btn-primary px-4">
                        Perbarui
                    </button>
                    <a href="{{ route('peristiwa_kematian.index') }}" class="btn btn-outline-light px-4">
                        Kembali
                    </a>
                </div>

            </form>
        </div>
    </div>
@endsection
