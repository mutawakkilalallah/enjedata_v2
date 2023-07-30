@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data Jabatan</h3>
                </div>
                <form action="/jabatan/{{ $j->id }}/update" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="golongan">Golongan</label>
                            <select class="form-control form-control-sm @error('golongan') is-invalid @enderror"
                                id="golongan" name="golongan">
                                <option value="{{ $j->golongan }}" selected>{{ $j->golongan }}</option>
                                @for ($i = 0; $i <= 9; $i++)
                                    <option value="{{ $i + 1 }}">{{ $i + 1 }}</option>
                                @endfor
                            </select>
                            @error('golongan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select class="form-control form-control-sm @error('kategori') is-invalid @enderror"
                                    id="kategori" name="kategori">
                                    <option value="{{ $j->kategori }}" selected>{{ $j->kategori }}</option>
                                    <option value="pengurus">pengurus</option>
                                    <option value="karyawan">karyawan</option>
                                </select>
                                @error('kategori')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('nama') is-invalid @enderror" id="nama"
                                    value="{{ old('nama') ? old('nama') : $j->nama }}" name="nama" autocomplete="off">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-flat btn-sm"><i
                                    class="fas fa-check-double"></i>
                                Simpan</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
