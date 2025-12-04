@extends('layouts.guest.app')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded p-4">

        <h4 class="text-white mb-4">Data User</h4>

        <div class="row g-4">
            @forelse ($user as $u)
                <div class="col-md-4">
                    <div class="kk-barber-card text-center">

                        <img src="{{ $u->media_photo
                            ? asset('storage/'.$u->media_photo)
                            : 'https://ui-avatars.com/api/?name='.urlencode($u->name) }}"
                            class="kk-barber-image">

                        <div class="kk-barber-body">
                            <div class="kk-title">{{ strtoupper($u->name) }}</div>
                            <div class="kk-desc">{{ $u->email }}</div>

                            <span class="badge {{ $u->role === 'admin' ? 'bg-danger' : 'bg-primary' }}">
                                {{ strtoupper($u->role) }}
                            </span>
                        </div>

                    </div>
                </div>
            @empty
                <div class="text-center text-white">
                    Tidak ada data.
                </div>
            @endforelse
        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $user->links('pagination::bootstrap-5') }}
        </div>

    </div>
</div>
@endsection
