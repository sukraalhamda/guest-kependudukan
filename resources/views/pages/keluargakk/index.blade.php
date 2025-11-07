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

        <div class="row g-4">
            @forelse($data as $kk)
                <div class="col-md-4">
                    <div class="kk-barber-card">

                        <!-- GAMBAR (bebas ganti) -->
                        <img src="{{ asset('asset/img/zayn.jpg') }}"
                             class="kk-barber-image" alt="KK Image">

                        <div class="kk-barber-body">
                            <div class="kk-title">KK: {{ $kk->kk_nomor }}</div>
                            <div class="kk-desc">Kepala Keluarga ID: {{ $kk->kepala_keluarga_warga_id }}</div>
                            <div class="kk-desc">RT: {{ $kk->rt }}</div>
                            <div class="kk-desc">RW: {{ $kk->rw }}</div>

                            <div class="kk-actions">
                                <a href="{{ route('keluargakk.edit', $kk->kk_id) }}"
                                   class="btn btn-warning kk-btn">
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

    </div>
</div>
@endsection
