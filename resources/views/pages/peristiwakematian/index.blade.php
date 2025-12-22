@extends('layouts.guest.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">

            {{-- HEADER --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-white">Data Peristiwa Kematian</h4>
                <a href="{{ route('peristiwa_kematian.create') }}" class="btn btn-primary">
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
                @forelse($data as $k)
                    @php
                        $media = $k->media->first();
                    @endphp

                    <div class="col-md-4">
                        <div class="card bg-dark text-white shadow h-100" data-bs-toggle="modal"
                            data-bs-target="#modal{{ $k->kematian_id }}" style="cursor:pointer">

                            <img src="{{ $media && str_contains($media->file_name, 'jpg')
                                ? asset('storage/' . $media->file_name)
                                : asset('asset/img/zayn.jpg') }}"
                                class="card-img-top" style="height:240px;object-fit:cover">

                            <div class="card-body text-center">
                                <h5 class="fw-bold">{{ $k->warga->nama ?? '-' }}</h5>
                                <small class="text-muted">Klik untuk detail</small>
                            </div>
                        </div>
                    </div>

                    {{-- MODAL DETAIL --}}
                    <div class="modal fade" id="modal{{ $k->kematian_id }}" tabindex="-1">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content bg-dark text-white">

                                <div class="modal-header border-secondary">
                                    <h5 class="modal-title">Detail Peristiwa Kematian</h5>
                                    <button type="button" class="btn-close btn-close-white"
                                        data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body text-center">
                                    <img src="{{ $media && str_contains($media->file_name, 'jpg')
                                        ? asset('storage/' . $media->file_name)
                                        : asset('asset/img/zayn.jpg') }}"
                                        class="img-fluid rounded mb-3">

                                    <p class="text-danger mb-3">
                                        Tanggal Meninggal : {{ $k->tgl_meninggal }} <br>
                                        Sebab : {{ $k->sebab }} <br>
                                        Lokasi : {{ $k->lokasi }} <br>
                                        No Surat : {{ $k->no_surat ?? '-' }}
                                    </p>

                                    @if ($k->media->count())
                                        @foreach ($k->media as $m)
                                            <a href="{{ asset('storage/' . $m->file_name) }}" target="_blank"
                                                class="btn btn-outline-info btn-sm me-1">
                                                Dokumen
                                            </a>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="modal-footer justify-content-center">
                                    <a href="{{ route('peristiwa_kematian.edit', $k->kematian_id) }}"
                                        class="btn btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form method="POST"
                                        action="{{ route('peristiwa_kematian.destroy', $k->kematian_id) }}"
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
                {{ $data->links() }}
            </div>

        </div>
    </div>
@endsection
