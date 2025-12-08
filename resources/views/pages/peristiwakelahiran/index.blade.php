@extends('layouts.guest.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h4 class="text-white">Data Peristiwa Kematian</h4>
                <a href="{{ route('peristiwa_kematian.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus me-2"></i>Tambah Data
                </a>
            </div>

            <div class="row g-4">
                @forelse($data as $item)
                    <div class="col-md-4">
                        <div class="kk-barber-card">

                            @if ($item->media->count() && preg_match('/\.(jpg|jpeg|png)$/i', $item->media->first()->file_name))
                                <img src="{{ asset('storage/' . $item->media->first()->file_name) }}" class="kk-barber-image" alt="media">
                            @else
                                <img src="{{ asset('asset/img/zayn.jpg') }}" class="kk-barber-image" alt="default">
                            @endif

                            <div class="kk-barber-body">
                                <div class="kk-title">No Surat: {{ $item->no_surat }}</div>
                                <div class="kk-desc">Warga: {{ $item->warga->nama ?? '-' }}</div>
                                <div class="kk-desc">Tanggal Meninggal: {{ $item->tgl_meninggal }}</div>
                                <div class="kk-desc">Sebab: {{ $item->sebab }}</div>
                                <div class="kk-desc">Saksi: {{ $item->saksi ?? '-' }}</div>

                                @if ($item->media->count())
                                    <div class="small mt-1">
                                        @foreach ($item->media as $media)
                                            <a href="{{ asset('storage/' . $media->file_name) }}" target="_blank" class="text-info me-2">DOKUMEN</a>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="kk-actions mt-3">
                                    <a href="{{ route('peristiwa_kematian.edit', $item->kematian_id) }}" class="btn btn-warning kk-btn">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form action="{{ route('peristiwa_kematian.destroy', $item->kematian_id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger kk-btn" onclick="return confirm('Yakin ingin menghapus?')">
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

            <div class="mt-4 d-flex justify-content-center">
                {{ $data->withQueryString()->links() }}
            </div>

        </div>
    </div>
@endsection
