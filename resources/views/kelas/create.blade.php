@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data Kelas</h3>
                </div>
                <form action="/kelas/create" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="lembaga_id">Lembaga</label>
                            <select class="form-control form-control-sm @error('lembaga_id') is-invalid @enderror"
                                id="lembaga_id" name="lembaga_id">
                                <option value="" selected>-- Pilih Lembaga --</option>
                                @foreach ($lembaga as $l)
                                    <option value="{{ $l->id }}">{{ $l->nama }}</option>
                                @endforeach
                            </select>
                            @error('lembaga_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control form-control-sm @error('nama') is-invalid @enderror"
                                id="nama" value="{{ old('nama') }}" name="nama" autocomplete="off">
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
