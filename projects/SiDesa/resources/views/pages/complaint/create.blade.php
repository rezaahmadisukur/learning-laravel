@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Buat Aduan</h1>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <form action="/complaint" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}"
                                class="@error('title') border-error @enderror form-control">
                            @error('title')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Isi Aduan</label>
                            <textarea name="content" id="content" cols="30" rows="10"
                                class="@error('content') border-error @enderror form-control">{{ old('content') }}</textarea>
                            @error('content')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="photo_proof">Bukti Foto</label>
                            <input type="file" name="photo_proof" id="photo_proof" value="{{ old('photo_proof') }}"
                                class="@error('photo_proof') border-error @enderror form-control">
                            @error('photo_proof')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end" style="gap: 2rem">
                            <a href="/complaint" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
