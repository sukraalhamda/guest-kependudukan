@extends('layouts.guest.app')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h4 class="text-white">Data Warga</h4>

                <a href="{{ route('warga.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus me-2"></i>Tambah Data
                </a>
            </div>

            <!-- 🔍 FORM SEARCH (kecil + ada tombol) -->
            <form action="" method="GET" class="d-flex mb-3" style="max-width: 300px;">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari nama warga..."
                    value="{{ request('search') }}" style="height: 38px;">
                <button class="btn btn-primary" style="height: 38px;">Cari</button>
            </form>

            <div class="row g-4">

                @forelse($data as $item)
                    <div class="col-md-4">
                        <div class="kk-barber-card">

                            <!-- Foto Warga -->
                            <img src="{{ asset('asset/img/zayn.jpg') }}" class="kk-barber-image">

                            <div class="kk-barber-body">

                                <div class="kk-title">{{ strtoupper($item->nama) }}</div>

                                <div class="kk-desc">NIK: {{ $item->nik }}</div>

                                <div class="kk-subtext">
                                    Jenis Kelamin: {{ $item->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                </div>

                                <div class="kk-subtext">
                                    TTL: {{ $item->tempat_lahir }}, {{ $item->tanggal_lahir }}
                                </div>

                                <div class="kk-subtext">Agama: {{ $item->agama }}</div>
                                <div class="kk-subtext">Pendidikan: {{ $item->pendidikan }}</div>
                                <div class="kk-subtext">Pekerjaan: {{ $item->pekerjaan }}</div>
                                <div class="kk-subtext">Status Kawin: {{ $item->status_perkawinan }}</div>
                                <div class="kk-subtext">Dalam Keluarga: {{ $item->status_dalam_keluarga }}</div>

                                <div class="kk-actions">
                                    <a href="{{ route('warga.edit', $item->warga_id) }}" class="btn btn-warning kk-btn">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form action="{{ route('warga.destroy', $item->warga_id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
                    <div class="col-12 text-center text-white">Belum ada data warga</div>
                @endforelse

            </div>

            {{-- PAGINATION --}}
            <div class="mt-4 d-flex justify-content-center">
                {{ $data->withQueryString()->links() }}
            </div>
        @endsection
