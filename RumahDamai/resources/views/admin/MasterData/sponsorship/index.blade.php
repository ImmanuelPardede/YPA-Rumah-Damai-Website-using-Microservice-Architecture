@extends('layouts.management.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="card-title">Jenis Sponsorship</h1>

                <!-- Tampilkan notifikasi jika ada -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <a href="{{ route('sponsorship.create') }}" class="btn btn-success mb-3">Tambah Jenis Sponsorship</a>
            </div>

            <div class="table-responsive">
                <table class="table mt-3 table-hover">
                    <thead>
                        <tr>
                            <th>Jenis Sponsorship</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jenis_sponsorship as $jenis_sponsorship)
                            <tr>
                                <td>{{ $jenis_sponsorship['jenis_sponsorship'] }}</td>
                                <td>
                                    <a href="{{ route('sponsorship.show', $jenis_sponsorship['ID']) }}" class="btn btn-info">Detail</a>
                                    <a href="{{ route('sponsorship.edit', $jenis_sponsorship['ID']) }}" class="btn btn-warning">Edit</a>
                                    <form method="POST" id="deleteForm{{ $jenis_sponsorship['ID'] }}" class="d-inline"
                                        action="{{ route('sponsorship.destroy', $jenis_sponsorship['ID']) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger"
                                            onclick="handleDeleteConfirmation('deleteForm{{ $jenis_sponsorship['ID'] }}')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">Tidak ada Jenis Sponsorship.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{-- <div class="d-flex justify-content-end">
                {{ $sponsorshipList->links('pagination::bootstrap-4') }}
            </div> --}}
        </div>
    </div>
</div>
@endsection
