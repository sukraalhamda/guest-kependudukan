@extends('layouts.guest.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">

            {{-- HEADER --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-white">Data Peristiwa Pindah</h4>
                <a href="{{ route('peristiwa_pindah.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus me-2"></i>Tambah
                </a>
            </div>

            {{-- SEARCH --}}
            <form method="GET" class="mb-4" style="max-width:400px;">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama warga..."
                        value="{{ request('search') }}">
                    <button class="btn btn-primary">Cari</button>
                </div>
            </form>

            {{-- CARD --}}
            <div class="row g-4">
                @forelse($data as $p)
                    @php
                        $media = $p->media->first();
                    @endphp

                    <div class="col-md-4">
                        <div class="card bg-dark text-white shadow h-100" data-bs-toggle="modal"
                            data-bs-target="#modal{{ $p->pindah_id }}" style="cursor:pointer">

                            <img src="{{ $media && str_contains($media->file_name, 'jpg') ? asset('storage/' . $media->file_name) : asset('asset/img/zayn.jpg') }}"
                                class="card-img-top" style="height:240px;object-fit:cover">

                            <div class="card-body text-center">
                                <h5 class="fw-bold">{{ $p->warga->nama ?? '-' }}</h5>
                                <small class="text-muted">Klik untuk detail</small>
                            </div>
                        </div>
                    </div>

                    {{-- MODAL DETAIL --}}
                    <div class="modal fade" id="modal{{ $p->pindah_id }}" tabindex="-1">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content bg-dark text-white">

                                <div class="modal-header border-secondary">
                                    <h5 class="modal-title">Detail Peristiwa Pindah</h5>
                                    <button type="button" class="btn-close btn-close-white"
                                        data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body text-center">
                                    <img src="{{ $media && str_contains($media->file_name, 'jpg') ? asset('storage/' . $media->file_name) : asset('asset/img/zayn.jpg') }}"
                                        class="img-fluid rounded mb-3">

                                    <p class="text-danger mb-3 text-start">
                                        <strong>Tanggal Pindah:</strong> {{ $p->tgl_pindah }} <br>
                                        <strong>Alamat Tujuan:</strong> {{ $p->alamat_tujuan }} <br>
                                        <strong>Kecamatan:</strong> {{ $p->kecamatan_tujuan ?? '-' }} <br>
                                        <strong>Kabupaten:</strong> {{ $p->kabupaten_tujuan ?? '-' }} <br>
                                        <strong>Provinsi:</strong> {{ $p->provinsi_tujuan ?? '-' }} <br>
                                        <strong>Negara:</strong> {{ $p->negara_tujuan ?? '-' }} <br>
                                        <strong>Alasan:</strong> {{ $p->alasan ?? '-' }} <br>
                                        <strong>Keterangan:</strong> {{ $p->keterangan ?? '-' }} <br>
                                        <strong>Status:</strong> {{ ucfirst($p->status) }} <br>
                                        <strong>No Surat:</strong> {{ $p->no_surat ?? '-' }}
                                    </p>

                                    @if ($p->media->count())
                                        @foreach ($p->media as $m)
                                            <a href="{{ asset('storage/' . $m->file_name) }}" target="_blank"
                                                class="btn btn-outline-info btn-sm me-1">
                                                Dokumen
                                            </a>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="modal-footer justify-content-center">
                                    <a href="{{ route('peristiwa_pindah.edit', $p->pindah_id) }}" class="btn btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form method="POST" action="{{ route('peristiwa_pindah.destroy', $p->pindah_id) }}"
                                        onsubmit="return confirm('Yakin hapus data?')">
                                        @csrf @method('DELETE')
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
                {{ $data->links() }}
            </div>

        </div>
    </div>
@endsection
