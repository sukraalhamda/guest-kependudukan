@extends('layouts.guest.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-white">Data User</h4>

                @if (Auth::user()->role === 'admin')
                    <a href="{{ route('user.create') }}" class="btn btn-danger">
                        <i class="fa fa-plus me-2"></i>Tambah Data
                    </a>
                @endif
            </div>

            <div class="row g-4">
                @foreach ($user as $u)
                    <div class="col-md-4">
                        <div class="kk-barber-card">

                            <img src="{{ $u->media_photo
                                ? asset('storage/' . $u->media_photo)
                                : 'https://ui-avatars.com/api/?name=' . urlencode($u->name) }}"
                                class="kk-barber-image">

                            <div class="kk-barber-body">
                                <div class="kk-title">{{ strtoupper($u->name) }}</div>
                                <div class="kk-desc">{{ $u->email }}</div>

                                <span class="badge {{ $u->role == 'admin' ? 'bg-danger' : 'bg-primary' }}">
                                    {{ strtoupper($u->role) }}
                                </span>

                                {{-- ADMIN ONLY --}}
                                @if (Auth::user()->role === 'admin')
                                    <div class="kk-actions mt-3 d-flex justify-content-center gap-2">
                                        <a href="{{ route('user.edit', $u->id) }}" class="btn btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <form action="{{ route('user.destroy', $u->id) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger" onclick="return confirm('Hapus data?')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
