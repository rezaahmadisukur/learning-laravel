@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Profile</h1>
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

    <div class="row">
        <div class="col">
            <div class="card">
                <form action="/profile/{{ Auth::user()->id }}" method="POST">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}"
                                class="@error('name') border-error @enderror form-control">
                            @error('name')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('nik', Auth::user()->email) }}"
                                class="@error('email') border-error @enderror form-control">
                            @error('email')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end gap-3">
                            <a href="/dashboard" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary">
                                Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection