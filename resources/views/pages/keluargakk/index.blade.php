@extends('layouts.guest.app')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h4 class="text-white">Data Keluarga KK</h4>

                <a href="{{ route('keluargakk.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus me-2"></i>Tambah Data
                </a>
            </div>

            <!-- 🔍 SEARCH + FILTER (MODEL WARGA) -->
            <form action="" method="GET" class="d-flex mb-3" style="max-width: 500px;">

                <!-- cari nomor kk -->
                <input type="text" name="search" class="form-control me-2" placeholder="Cari nomor KK..."
                    value="{{ request('search') }}" style="height: 38px;">

                <!-- filter kepala keluarga -->
                <select name="kepala_keluarga" class="form-control me-2" style="height: 38px;">
                    <option value="">Kepala Keluarga</option>

                    @foreach (\App\Models\warga::all() as $w)
                        <option value="{{ $w->warga_id }}"
                            {{ request('kepala_keluarga') == $w->warga_id ? 'selected' : '' }}>
                            {{ $w->nama }}
                        </option>
                    @endforeach
                </select>

                <button class="btn btn-primary" style="height: 38px;">Filter</button>
            </form>

            <!-- CARD DATA -->
            <div class="row g-4">
                @forelse($data as $kk)
                    <div class="col-md-4">
                        <div class="kk-barber-card">

                            <img src="{{ asset('asset/img/zayn.jpg') }}" class="kk-barber-image" alt="KK Image">

                            <div class="kk-barber-body">
                                <div class="kk-title">KK: {{ $kk->kk_nomor }}</div>
                                <div class="kk-desc">Kepala Keluarga: {{ $kk->kepalaKeluarga->nama ?? '-' }}</div>
                                <div class="kk-desc">RT: {{ $kk->rt }}</div>
                                <div class="kk-desc">RW: {{ $kk->rw }}</div>

                                <div class="kk-actions">
                                    <a href="{{ route('keluargakk.edit', $kk->kk_id) }}" class="btn btn-warning kk-btn">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form action="{{ route('keluargakk.destroy', $kk->kk_id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger kk-btn"
                                            onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>
                @empty
                    <div class="text-center text-white">Tidak ada data</div>
                @endforelse
            </div>

            <!-- PAGINATION -->
            <div class="mt-4 d-flex justify-content-center">
                {{ $data->withQueryString()->links() }}
            </div>

        </div>
    </div>
    <!-- 🟥 AKHIR FILTER -->

    <div class="row g-4">
        @forelse($data as $kk)
            <div class="col-md-4">
                <div class="kk-barber-card">

                    <img src="{{ asset('asset/img/zayn.jpg') }}" class="kk-barber-image" alt="KK Image">

                    <div class="kk-barber-body">
                        <div class="kk-title">KK: {{ $kk->kk_nomor }}</div>
                        <div class="kk-desc">Kepala Keluarga ID: {{ $kk->kepala_keluarga_warga_id }}</div>
                        <div class="kk-desc">RT: {{ $kk->rt }}</div>
                        <div class="kk-desc">RW: {{ $kk->rw }}</div>

                        <div class="kk-actions">
                            <a href="{{ route('keluargakk.edit', $kk->kk_id) }}" class="btn btn-warning kk-btn">
                                <i class="fa fa-edit"></i>
                            </a>

                            <form action="{{ route('keluargakk.destroy', $kk->kk_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger kk-btn"
                                    onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        @empty
            <div class="text-center text-white">Tidak ada data</div>
        @endforelse
    </div>

    <!-- PAGINATION -->
    <div class="mt-4 d-flex justify-content-center">
        <style>
            .pagination .page-link {
                background-color: #1e1f24;
                border: 1px solid #444;
                color: #fff;
            }

            .pagination .page-link:hover {
                background-color: #343a40;
            }

            .pagination .active .page-link {
                background-color: #fd0d0d;
                border-color: #fd0d0d;
                color: white;
            }
        </style>

        {{ $data->links() }}
    </div>

    </div>
    </div>
@endsection
