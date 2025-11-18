@extends('layouts.guest.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h4 class="text-white">Data Anggota Keluarga</h4>

                <a href="{{ route('anggota_keluarga.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus me-2"></i>Tambah Data
                </a>
            </div>

            <!-- 🔍 SEARCH + FILTER HUBUNGAN -->
            <form action="" method="GET" class="d-flex mb-3" style="gap: 10px; max-width: 500px;">

                <input type="text" name="search" class="form-control" placeholder="Cari Nama Anggota Keluarga..."
                    value="{{ request('search') }}" style="height: 38px;">

                <select name="hubungan" class="form-select" style="height:38px;">
                    <option value="">Semua Hubungan</option>
                    <option value="ayah" {{ request('hubungan') == 'ayah' ? 'selected' : '' }}>Ayah</option>
                    <option value="ibu" {{ request('hubungan') == 'ibu' ? 'selected' : '' }}>Ibu</option>
                    <option value="anak" {{ request('hubungan') == 'anak' ? 'selected' : '' }}>Anak</option>
                    <option value="saudara" {{ request('hubungan') == 'saudara' ? 'selected' : '' }}>Saudara</option>
                </select>

                <button class="btn btn-primary" style="height: 38px;">Filter</button>
            </form>

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
                                    <a href="{{ route('anggota_keluarga.edit', $a->anggota_id) }}"
                                        class="btn btn-warning kk-btn">
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

            <div class="mt-4 d-flex justify-content-center">
                {{ $anggota->appends([
                        'search' => $search,
                        'hubungan' => $filter_hubungan,
                    ])->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>
@endsection
