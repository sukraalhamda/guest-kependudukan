@extends('layouts.guest.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">

            {{-- HEADER --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-white">Data Warga</h4>
                <a href="{{ route('warga.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus me-2"></i>Tambah
                </a>
            </div>

            {{-- SEARCH + FILTER --}}
            <form method="GET" class="mb-4" style="max-width:500px;">
                <div class="row g-2">
                    <div class="col-md-6">
                        <input type="text" name="search" class="form-control" placeholder="Cari nama warga..."
                            value="{{ request('search') }}">
                    </div>

                    <div class="col-md-4">
                        <select name="jenis_kelamin" class="form-control">
                            <option value="">Semua</option>
                            <option value="L" {{ request('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki
                            </option>
                            <option value="P" {{ request('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-primary w-100">Filter</button>
                    </div>
                </div>
            </form>

            {{-- CARD --}}
            <div class="row g-4">
                @forelse($data as $w)
                    <div class="col-md-4">
                        <div class="card bg-dark text-white shadow h-100" data-bs-toggle="modal"
                            data-bs-target="#modal{{ $w->warga_id }}" style="cursor:pointer">

                            <img src="{{ asset('asset/img/zayn.jpg') }}" class="card-img-top"
                                style="height:240px;object-fit:cover">

                            <div class="card-body text-center">
                                <h5 class="fw-bold">{{ strtoupper($w->nama) }}</h5>
                                <small class="text-muted">Klik untuk detail</small>
                            </div>
                        </div>
                    </div>

                    {{-- MODAL DETAIL --}}
                    <div class="modal fade" id="modal{{ $w->warga_id }}" tabindex="-1">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content bg-dark text-white">

                                <div class="modal-header border-secondary">
                                    <h5 class="modal-title">Detail Warga</h5>
                                    <button type="button" class="btn-close btn-close-white"
                                        data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body text-center">
                                    <img src="{{ asset('asset/img/zayn.jpg') }}" class="img-fluid rounded mb-3">

                                    <p class="text-danger mb-3 text-start">
                                        <strong>NIK</strong> : {{ $w->nik }} <br>
                                        <strong>Jenis Kelamin</strong> :
                                        {{ $w->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }} <br>
                                        <strong>TTL</strong> : {{ $w->tempat_lahir }}, {{ $w->tanggal_lahir }} <br>
                                        <strong>Agama</strong> : {{ $w->agama }} <br>
                                        <strong>Pendidikan</strong> : {{ $w->pendidikan }} <br>
                                        <strong>Pekerjaan</strong> : {{ $w->pekerjaan }} <br>
                                        <strong>Status Kawin</strong> : {{ $w->status_perkawinan }} <br>
                                        <strong>Status Keluarga</strong> : {{ $w->status_dalam_keluarga }}
                                    </p>
                                </div>

                                <div class="modal-footer justify-content-center">
                                    <a href="{{ route('warga.edit', $w->warga_id) }}" class="btn btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form method="POST" action="{{ route('warga.destroy', $w->warga_id) }}"
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
                    <div class="text-center text-white">Belum ada data warga</div>
                @endforelse
            </div>

            {{-- PAGINATION --}}
            <div class="mt-4 d-flex justify-content-center">
                {{ $data->withQueryString()->links() }}
            </div>

        </div>
    </div>
@endsection
