@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Data Penduduk</h1>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <form action="/resident/{{ $resident->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" inputmode="numeric" name="nik" id="nik"
                                value="{{ old('nik', $resident->nik) }}"
                                class="@error('nik') border-error @enderror form-control">
                            @error('nik')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $resident->name) }}"
                                class="@error('name') border-error @enderror form-control">
                            @error('name')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gender">Jenis Kelamin</label>
                            <select name="gender" id="gender" class="@error('gender') border-error @enderror form-control">
                                @foreach ($genders as $item)
                                    <option value="{{ $item->value }}" @selected(old('gender', $resident->gender) == $item->value)>
                                        {{ $item->label }}
                                    </option>
                                @endforeach
                            </select>
                            @error('gender')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="birth_of_date">Tanggal Lahir</label>
                            <input type="date" name="birth_of_date" id="birth_of_date"
                                value="{{ old('birth_of_date', $resident->birth_of_date) }}"
                                class="@error('birth_of_date') border-error @enderror form-control">
                            @error('birth_of_date')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="birth_of_place">Tempat Lahir</label>
                            <input type="text" name="birth_of_place" id="birth_of_place"
                                value="{{ old('birth_of_place', $resident->birth_of_place) }}"
                                class="@error('birth_of_place') border-error @enderror form-control">
                            @error('birth_of_place')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <textarea name="address" id="address" cols="30" rows="10"
                                class="@error('address') border-error @enderror form-control">{{ old('address', $resident->address) }}</textarea>
                            @error('address')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="religion">Agama</label>
                            <input type="text" name="religion" id="religion"
                                value="{{ old('religion', $resident->religion) }}"
                                class="@error('religion') border-error @enderror form-control">
                            @error('religion')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="marital_status">Status Perkawinan</label>
                            <select name="marital_status" id="marital_status"
                                class="@error('marital_status') border-error @enderror form-control">
                                @foreach ($marital_statuses as $item)
                                    <option value="{{ $item->value }}"
                                        @selected(old('marital_status', $resident->marital_status) == $item->value)>
                                        {{ $item->label }}
                                    </option>
                                @endforeach
                            </select>
                            @error('marital_status')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="occupation">Pekerjaan</label>
                            <input type="text" name="occupation" id="occupation"
                                value="{{ old('occupation', $resident->occupation) }}"
                                class="@error('occupation') border-error @enderror form-control">
                            @error('occupation')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Telepon</label>
                            <input type="text" inputmode="numeric" name="phone" id="phone"
                                value="{{ old('phone', $resident->phone) }}"
                                class="@error('phone') border-error @enderror form-control">
                            @error('phone')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status Kependudukan</label>
                            <select name="status" id="status" class="@error('status')
                            border-error @enderror form-control">
                                @foreach ($statuses as $item)
                                    <option value="{{ $item->value }}" @selected(old('status',$resident->status) == $item->value)>
                                        {{ $item->label }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status')
                                <div class="error">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end" style="gap: 2rem">
                            <a href="/resident" class="btn btn-danger">Kembali</a>
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
