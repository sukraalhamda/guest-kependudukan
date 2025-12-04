@extends('layouts.guest.app')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded p-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-white">Data User</h4>

            <a href="{{ route('user.create') }}" class="btn btn-danger">
                <i class="fa fa-plus me-2"></i>Tambah Data
            </a>
        </div>

        <!-- 🔍 Search + Filter -->
        <form method="GET" class="d-flex gap-2 mb-4" style="max-width: 600px;">
            <input type="text" name="search" class="form-control"
                placeholder="Cari nama user..." value="{{ request('search') }}">

            <select name="email_filter" class="form-control">
                <option value="">Semua Email</option>
                <option value="gmail" {{ request('email_filter')=='gmail'?'selected':'' }}>Gmail</option>
            </select>

            <button class="btn btn-danger">Filter</button>
        </form>

        <div class="row g-4">
            @forelse($user as $u)
                @php
                    $foto = \App\Models\Media::where('ref_table', 'users')
                        ->where('ref_id', $u->id)
                        ->first();
                @endphp

                <div class="col-md-4">
                    <div class="kk-barber-card">

                        {{-- GAMBAR --}}
                        @if ($foto)
                            <img src="{{ asset('storage/'.$foto->file_name) }}"
                                class="kk-barber-image"
                                alt="Foto {{ $u->name }}">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($u->name) }}&background=random&size=150"
                                class="kk-barber-image"
                                alt="Avatar {{ $u->name }}">
                        @endif

                        <div class="kk-barber-body">
                            <div class="kk-title">{{ strtoupper($u->name) }}</div>
                            <div class="kk-desc">{{ $u->email }}</div>
                            <div class="kk-subtext">
                                Dibuat: {{ $u->created_at->format('d-m-Y') }}
                            </div>

                            <div class="kk-actions">
                                <a href="{{ route('user.edit', $u->id) }}"
                                   class="btn btn-warning kk-btn">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('user.destroy',$u->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger kk-btn">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            @empty
                <div class="text-center text-white mt-4">
                    Belum ada data user.
                </div>
            @endforelse
        </div>

        <!-- PAGINATION -->
        <div class="mt-4 d-flex justify-content-center">
            {{ $user->withQueryString()->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
