@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Permintaan Akun</h1>
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
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td class="d-flex justify-content-center">
                                                <div class="d-flex gap-2">
                                                    <button type="button" class="d-inline-block btn btn-sm btn-danger"
                                                        data-bs-toggle="modal" data-bs-target="#confirmationReject-{{ $user->id }}">
                                                        Tolak
                                                    </button>
                                                    <button type="button" class="d-inline-block btn btn-sm btn-success"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#confirmationApprove-{{ $user->id }}">
                                                        Setuju
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @include('pages.account-request.confirmation-approve')
                                        @include('pages.account-request.confirmation-reject')
                                    @endforeach
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
