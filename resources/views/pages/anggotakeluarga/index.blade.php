@extends('layouts.guest.app')

@section('content')
    <!-- Tombol Tambah Anggota -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('anggota_keluarga.create') }}" class="btn btn-primary btn-modern">
            <i class="fa fa-plus me-2"></i>Tambah Anggota Keluarga
        </a>
    </div>

    <div class="row g-4">
        @forelse($anggota as $a)
            <div class="col-md-4">
                <div class="kk-barber-card">

                    <img src="{{ asset('asset/img/zayn.jpg') }}" class="kk-barber-image" alt="Family Image">

                    <div class="kk-barber-body">
                        <div class="kk-title">{{ strtoupper($a->warga->nama ?? '-') }}</div>
                        <div class="kk-desc">
                            KK: {{ $a->keluargaKK->kk_nomor ?? '-' }} <br>
                            Hubungan: {{ ucfirst($a->hubungan) }}
                        </div>

                        <div class="kk-subtext">
                            Ditambahkan: {{ $a->created_at->format('d-m-Y') }}
                        </div>

                        <div class="kk-actions">
                            <a href="{{ route('anggota_keluarga.edit', $a->anggota_id) }}" class="btn btn-warning kk-btn">
                                <i class="fa fa-edit"></i>
                            </a>

                            <form action="{{ route('anggota_keluarga.destroy', $a->anggota_id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus anggota ini?')" class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger kk-btn">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        @empty
            <div class="text-center text-white mt-4">
                Belum ada data anggota keluarga.
            </div>
        @endforelse
    </div>
@endsection
