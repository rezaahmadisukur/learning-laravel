@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Password</h1>
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
    @if (session()->has('error'))
        <script>
            Swal.fire({
                title: "Gagal",
                text: "{{ session()->get('error') }}",
                icon: "error"
            });
        </script>
    @endif

    <div class="row">
        <div class="col">
            <div class="card">
                <form action="/change-password/{{ Auth::user()->id }}" method="POST">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="old_password">Password Lama</label>
                            <input type="password" name="old_password" id="old_password"
                                class="@error('old_password') border-error @enderror form-control">
                            @error('old_password')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="new_password">Password Baru</label>
                            <input type="password" name="new_password" id="new_password"
                                class="@error('new_password') border-error @enderror form-control">
                            @error('new_password')
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