@extends('layouts.guest.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">

            {{-- HEADER --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-white">Data Keluarga KK</h4>
                <a href="{{ route('keluargakk.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus me-2"></i>Tambah
                </a>
            </div>

            {{-- SEARCH + FILTER --}}
            <form method="GET" class="mb-4" style="max-width:600px;">
                <div class="row g-2">
                    <div class="col-md-6">
                        <input type="text" name="search" class="form-control" placeholder="Cari nomor KK..."
                            value="{{ request('search') }}">
                    </div>

                    <div class="col-md-4">
                        <select name="kepala_keluarga" class="form-control">
                            <option value="">Kepala Keluarga</option>
                            @foreach (\App\Models\Warga::all() as $w)
                                <option value="{{ $w->warga_id }}"
                                    {{ request('kepala_keluarga') == $w->warga_id ? 'selected' : '' }}>
                                    {{ $w->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-primary w-100">Filter</button>
                    </div>
                </div>
            </form>

            {{-- CARD --}}
            <div class="row g-4">
                @forelse($data as $kk)
                    <div class="col-md-4">
                        <div class="card bg-dark text-white shadow h-100" data-bs-toggle="modal"
                            data-bs-target="#modal{{ $kk->kk_id }}" style="cursor:pointer">

                            <img src="{{ asset('asset/img/zayn.jpg') }}" class="card-img-top"
                                style="height:240px;object-fit:cover">

                            <div class="card-body text-center">
                                <h5 class="fw-bold">KK {{ $kk->kk_nomor }}</h5>
                                <small class="text-muted">Klik untuk detail</small>
                            </div>
                        </div>
                    </div>

                    {{-- MODAL DETAIL --}}
                    <div class="modal fade" id="modal{{ $kk->kk_id }}" tabindex="-1">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content bg-dark text-white">

                                <div class="modal-header border-secondary">
                                    <h5 class="modal-title">Detail Keluarga KK</h5>
                                    <button type="button" class="btn-close btn-close-white"
                                        data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body text-center">
                                    <img src="{{ asset('asset/img/zayn.jpg') }}" class="img-fluid rounded mb-3">

                                    <p class="text-danger mb-3">
                                        Nomor KK : {{ $kk->kk_nomor }} <br>
                                        Kepala Keluarga : {{ $kk->kepalaKeluarga->nama ?? '-' }} <br>
                                        RT : {{ $kk->rt }} <br>
                                        RW : {{ $kk->rw }}
                                    </p>
                                </div>

                                <div class="modal-footer justify-content-center">
                                    <a href="{{ route('keluargakk.edit', $kk->kk_id) }}" class="btn btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form method="POST" action="{{ route('keluargakk.destroy', $kk->kk_id) }}"
                                        onsubmit="return confirm('Yakin hapus data?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">
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

            {{-- PAGINATION --}}
            <div class="mt-4 d-flex justify-content-center">
                {{ $data->withQueryString()->links() }}
            </div>

        </div>
    </div>
@endsection
