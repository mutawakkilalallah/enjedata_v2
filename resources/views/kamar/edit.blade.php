@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data Kamar</h3>
                </div>
                <form action="/kamar/{{ $k->id }}/update" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="wilayah_id">Lembaga</label>
                            <select class="form-control form-control-sm @error('wilayah_id') is-invalid @enderror"
                                id="wilayah_id" name="wilayah_id">
                                <option value="{{ $k->wilayah_id }}" selected>{{ $k->wilayah_nama }}</option>
                                @foreach ($wilayah as $w)
                                    <option value="{{ $w->id }}">{{ $w->nama }}</option>
                                @endforeach
                            </select>
                            @error('wilayah_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control form-control-sm @error('nama') is-invalid @enderror"
                                id="nama" value="{{ old('nama') ? old('nama') : $k->nama }}" name="nama"
                                autocomplete="off">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-flat btn-sm"><i class="fas fa-check-double"></i>
                            Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
