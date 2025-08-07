@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Penduduk</h1>
        <a href="/resident/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah</a>
    </div>

    {{-- Table --}}
    <div class="row text-s">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <table class="table table-responsive table-bordered table-hovered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jenis Kelain</th>
                                <th>Tempat, Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Agama</th>
                                <th>Status Perkawinan</th>
                                <th>Pekerjaan</th>
                                <th>Telepon</th>
                                <th>Status Penduduk</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @if (count($residents) < 1)
                            <tbody>
                                <tr>
                                    <td colspan="11">
                                        <p class="my-5 text-center">Tidak ada data</p>
                                    </td>
                                </tr>
                            </tbody>
                        @else
                            <tbody>
                                @foreach ($residents as $resident)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $resident->nik }}</td>
                                        <td>{{ $resident->name }}</td>
                                        <td>{{ $resident->gender }}</td>
                                        <td>{{ $resident->birth_of_place }}, {{ $resident->birth_of_date }}</td>
                                        <td>{{ $resident->address }}</td>
                                        <td>{{ $resident->religion }}</td>
                                        <td>{{ $resident->marital_status }}</td>
                                        <td>{{ $resident->occupation }}</td>
                                        <td>{{ $resident->phone }}</td>
                                        <td>{{ $resident->status }}</td>
                                        <td>
                                            <div class="d-flex gap-2 align-items-center">
                                                <a href="/resident/{{ $resident->id }}/edit"
                                                    class="d-inline-block btn btn-sm btn-warning">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <button type="button" class="d-inline-block btn btn-sm btn-danger"
                                                    data-bs-toggle="modal" data-bs-target="#confirmationDelete-{{ $resident->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                @if(!is_null($resident->user_id))
                                                    <button type="button" class="d-inline-block btn btn-sm btn-outline-info"
                                                        data-bs-toggle="modal" data-bs-target="#detailAccount-{{ $resident->id }}">
                                                        Lihat Akun
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @include('pages.resident.confirmation-delete')
                                    @include('pages.resident.detail-account')
                                @endforeach
                            </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
