@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Akun Penduduk</h1>
    </div>

    @if (session()->has('success'))
        <script>
            Swal.fire({
                title: "Berhasil",
                text: "{{ session()->get('success') }}",
                icon: "success"
            });
        </script>
    @endif

    {{-- Table --}}
    <div class="row text-s">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <div style="overflow-x: auto">
                        <table class="table table-bordered table-hovered" style="min-width: 100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            @if (count($users) < 1)
                                <tbody>
                                    <tr>
                                        <td colspan="11">
                                            <p class="my-5 text-center">Tidak ada data</p>
                                        </td>
                                    </tr>
                                </tbody>
                            @else
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration + $users->firstItem() - 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    @if($user->status == 'approved')
                                                        <span class="badge badge-success px-3 py-1" style="border-radius: 10px">
                                                            Aktif
                                                        </span>
                                                    @else
                                                        <span class="badge badge-danger px-3 py-1" style="border-radius: 10px">
                                                            Tidak Aktif
                                                        </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="d-flex justify-content-center">
                                                <div class="d-flex gap-2">
                                                    @if($user->status == 'approved')
                                                        <button type="button" class="d-inline-block btn btn-sm btn-outline-danger"
                                                            data-bs-toggle="modal" data-bs-target="#confirmationReject-{{ $user->id }}">
                                                            Non-aktifkan Akun
                                                        </button>
                                                    @else
                                                        <button type="button" class="d-inline-block btn btn-sm btn-outline-success"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#confirmationApprove-{{ $user->id }}">
                                                            Aktifkan Akun
                                                        </button>
                                                    @endif

                                                </div>
                                            </td>
                                        </tr>
                                        @include('pages.account-list.confirmation-approve')
                                        @include('pages.account-list.confirmation-reject')
                                    @endforeach
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
                @if ($users->hasPages())
                    <div class="card-foot mx-3">
                        {{ $users->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
