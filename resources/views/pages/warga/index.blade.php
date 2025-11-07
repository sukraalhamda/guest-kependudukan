    @extends('layouts.guest.app')
    @section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0">Data Warga</h6>
        <a href="{{ route('warga.create') }}" class="btn btn-primary btn-modern">
            <i class="fa fa-plus me-2"></i>Tambah Warga
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success text-start">{{ session('success') }}</div>
    @endif

    <div class="row g-4">

        @forelse($data as $item)
            <div class="col-md-4">
                <div class="kk-barber-card">

                    <!-- Placeholder Foto Warga -->
                    <img src="{{ asset('asset/img/zayn.jpg') }}" class="kk-barber-image">

                    <div class="kk-barber-body">

                        <div class="kk-title">{{ strtoupper($item->nama) }}</div>

                        <div class="kk-desc">NIK: {{ $item->nik }}</div>

                        <div class="kk-subtext">Jenis Kelamin:
                            {{ $item->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</div>
                        <div class="kk-subtext">TTL: {{ $item->tempat_lahir }}, {{ $item->tanggal_lahir }}</div>
                        <div class="kk-subtext">Agama: {{ $item->agama }}</div>
                        <div class="kk-subtext">Pendidikan: {{ $item->pendidikan }}</div>
                        <div class="kk-subtext">Pekerjaan: {{ $item->pekerjaan }}</div>
                        <div class="kk-subtext">Status Kawin: {{ $item->status_perkawinan }}</div>
                        <div class="kk-subtext">Dalam Keluarga: {{ $item->status_dalam_keluarga }}</div>

                        <div class="kk-actions">
                            <a href="{{ route('warga.edit', $item->warga_id) }}" class="btn btn-warning kk-btn">
                                <i class="fa fa-edit"></i>
                            </a>

                            <form action="{{ route('warga.destroy', $item->warga_id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
            <div class="col-12 text-center text-white">Belum ada data warga</div>
        @endforelse

    </div>
@endsection
