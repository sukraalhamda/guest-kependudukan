@extends('layouts.guest.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">

            {{-- HEADER --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-white">Data Anggota Keluarga</h4>
                <a href="{{ route('anggota_keluarga.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus me-2"></i>Tambah
                </a>
            </div>

            {{-- SEARCH + FILTER --}}
            <form method="GET" class="mb-4" style="max-width:500px;">
                <div class="row g-2">
                    <div class="col-md-6">
                        <input type="text" name="search" class="form-control" placeholder="Cari nama anggota..."
                            value="{{ request('search') }}">
                    </div>

                    <div class="col-md-4">
                        <select name="hubungan" class="form-control">
                            <option value="">Semua Hubungan</option>
                            <option value="ayah" {{ request('hubungan') == 'ayah' ? 'selected' : '' }}>Ayah</option>
                            <option value="ibu" {{ request('hubungan') == 'ibu' ? 'selected' : '' }}>Ibu</option>
                            <option value="anak" {{ request('hubungan') == 'anak' ? 'selected' : '' }}>Anak</option>
                            <option value="saudara" {{ request('hubungan') == 'saudara' ? 'selected' : '' }}>Saudara
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
                @forelse($anggota as $a)
                    <div class="col-md-4">
                        <div class="card bg-dark text-white shadow h-100" data-bs-toggle="modal"
                            data-bs-target="#modal{{ $a->anggota_id }}" style="cursor:pointer">

                            <img src="{{ asset('asset/img/zayn.jpg') }}" class="card-img-top"
                                style="height:240px;object-fit:cover">

                            <div class="card-body text-center">
                                <h5 class="fw-bold">{{ strtoupper($a->warga->nama ?? '-') }}</h5>
                                <small class="text-muted">Klik untuk detail</small>
                            </div>
                        </div>
                    </div>

                    {{-- MODAL DETAIL --}}
                    <div class="modal fade" id="modal{{ $a->anggota_id }}" tabindex="-1">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content bg-dark text-white">

                                <div class="modal-header border-secondary">
                                    <h5 class="modal-title">Detail Anggota Keluarga</h5>
                                    <button type="button" class="btn-close btn-close-white"
                                        data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body text-center">
                                    <img src="{{ asset('asset/img/zayn.jpg') }}" class="img-fluid rounded mb-3">

                                    <p class="text-danger mb-3 text-start">
                                        <strong>Nama</strong> : {{ $a->warga->nama ?? '-' }} <br>
                                        <strong>Nomor KK</strong> : {{ $a->keluargaKK->kk_nomor ?? '-' }} <br>
                                        <strong>Hubungan</strong> : {{ ucfirst($a->hubungan) }} <br>
                                        <strong>Tanggal Ditambahkan</strong> :
                                        {{ $a->created_at->format('d-m-Y') }}
                                    </p>
                                </div>

                                <div class="modal-footer justify-content-center">
                                    <a href="{{ route('anggota_keluarga.edit', $a->anggota_id) }}" class="btn btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form method="POST" action="{{ route('anggota_keluarga.destroy', $a->anggota_id) }}"
                                        onsubmit="return confirm('Yakin hapus anggota ini?')">
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
                    <div class="text-center text-white">Belum ada data anggota keluarga</div>
                @endforelse
            </div>

            {{-- PAGINATION --}}
            <div class="mt-4 d-flex justify-content-center">
                {{ $anggota->withQueryString()->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>
@endsection
