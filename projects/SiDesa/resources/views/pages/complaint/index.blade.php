@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Aduan Penduduk</h1>
        <a href="/complaint/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Buat Aduan</a>
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
                    <table class="table table-bordered table-hovered">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Judul</th>
                                <th>Isi Aduan</th>
                                <th>Status</th>
                                <th>Foto Bukti</th>
                                <th>Tanggal Laporan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        @if (count($complaints) < 1)
                            <tbody>
                                <tr>
                                    <td colspan="11">
                                        <p class="my-5 text-center">Tidak ada data</p>
                                    </td>
                                </tr>
                            </tbody>
                        @else
                            <tbody>
                                @foreach ($complaints as $complaint)
                                    <tr>
                                        <td>{{ $loop->iteration + $complaints->firstItem() - 1 }}</td>
                                        <td>{{ $complaint->title }}</td>
                                        <td>{!! wordwrap($complaint->content, 50, "<br>\n") !!}</td>
                                        <td>{{ $complaint->status_label }}</td>
                                        <td>
                                            @if (isset($complaint->photo_proof))
                                                @php
                                                    $filePath = "storage/$complaint->photo_proof"
                                                @endphp
                                                <a href="{{ $filePath }}" target="_blank">
                                                    <img src="{{ $filePath }}" alt="Foto Bukti" style="max-width: 50px;">
                                                </a>
                                            @else
                                                <p class="text-center">Tidak ada</p>
                                            @endif
                                        </td>
                                        <td>{{ $complaint->report_date_label }}</td>
                                        <td>
                                            <div class="d-flex gap-2 align-items-center">
                                                <a href="/complaint/{{ $complaint->id }}/edit"
                                                    class="d-inline-block btn btn-sm btn-warning">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <button type="button" class="d-inline-block btn btn-sm btn-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#confirmationDelete-{{ $complaint->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('pages.complaint.confirmation-delete')
                                @endforeach
                            </tbody>
                        @endif
                    </table>
                </div>
                @if ($complaints->hasPages())
                    <div class="card-footer">
                        {{ $complaints->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
