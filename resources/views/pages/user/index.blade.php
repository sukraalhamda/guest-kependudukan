@extends('layouts.guest.app')
@section('content')
    <!-- Tombol Tambah User -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('user.create') }}" class="btn btn-primary btn-modern">
            <i class="fa fa-plus me-2"></i>Tambah User
        </a>
    </div>

    <div class="row g-4">

        @forelse($user as $u)
            <div class="col-md-4">
                <div class="kk-barber-card">

                    <img src="{{ asset('asset/img/zayn.jpg') }}" class="kk-barber-image" alt="User Image">

                    <div class="kk-barber-body">

                        <div class="kk-title">{{ strtoupper($u->name) }}</div>
                        <div class="kk-desc">{{ $u->email }}</div>

                        <div class="kk-subtext">
                            Dibuat: {{ $u->created_at->format('d-m-Y') }}
                        </div>

                        <div class="kk-actions">
                            <a href="{{ route('user.edit', $u->id) }}" class="btn btn-warning kk-btn">
                                <i class="fa fa-edit"></i>
                            </a>

                            <form action="{{ route('user.destroy', $u->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus user ini?')">
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
                Belum ada data user.
            </div>
        @endforelse

    </div>
@endsection
