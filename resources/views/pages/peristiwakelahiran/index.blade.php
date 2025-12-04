@extends('layouts.guest.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h4 class="text-white">Data Peristiwa Kelahiran</h4>

                <a href="{{ route('peristiwa_kelahiran.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus me-2"></i>Tambah Data
                </a>
            </div>

            <div class="row g-4">
                @forelse($kelahiran as $item)
                    <div class="col-md-4">
                        <div class="kk-barber-card">

                            {{-- Thumbnail --}}
                            @if ($item->file_pendukung && preg_match('/\.(jpg|jpeg|png)$/i', $item->file_pendukung))
                                <img src="{{ asset('storage/' . $item->file_pendukung) }}" class="kk-barber-image"
                                    alt="Kel">
                            @else
                                <img src="{{ asset('asset/img/zayn.jpg') }}" class="kk-barber-image">
                            @endif

                            <div class="kk-barber-body">
                                <div class="kk-title">No Akta: {{ $item->no_akta }}</div>
                                <div class="kk-desc">Warga: {{ $item->warga->nama ?? '-' }}</div>
                                <div class="kk-desc">Tanggal Lahir: {{ $item->tgl_lahir }}</div>
                                <div class="kk-desc">Tempat: {{ $item->tempat_lahir }}</div>

                                @if ($item->file_pendukung)
                                    <a href="{{ asset('storage/' . $item->file_pendukung) }}" class="text-info small"
                                        target="_blank">
                                        📎 Lihat File Pendukung
                                    </a>
                                @endif

                                <div class="kk-actions mt-3">
                                    <a href="{{ route('peristiwa_kelahiran.edit', $item->kelahiran_id) }}"
                                        class="btn btn-warning kk-btn">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form action="{{ route('peristiwa_kelahiran.destroy', $item->kelahiran_id) }}"
                                        method="POST">
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

            <div class="mt-4 d-flex justify-content-center">
                {{ $kelahiran->withQueryString()->links() }}
            </div>

        </div>
    </div>
@endsection
