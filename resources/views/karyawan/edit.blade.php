@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data Karyawan</h3>
                </div>
                <form action="/karyawan/{{ $karyawan->karyawan_id }}/update" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="jabatan_id">Jabatan</label>
                            <select class="form-control form-control-sm @error('jabatan_id') is-invalid @enderror"
                                id="jabatan_id" name="jabatan_id">
                                <option value="{{ $karyawan->jabatan_id }}" selected>{{ $karyawan->jabatan_nama }}</option>
                                @foreach ($jabatan as $j)
                                    <option value="{{ $j->id }}">{{ $j->nama }}</option>
                                @endforeach
                            </select>
                            @error('jabatan_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ket">KETERANGAN</label>
                            <input type="text" class="form-control form-control-sm @error('ket') is-invalid @enderror"
                                id="ket" value="{{ old('ket') ? old('ket') : $karyawan->ket }}" name="ket"
                                autocomplete="off">
                            @error('ket')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <input type="hidden" name="uuid" value="{{ $karyawan->person_uuid }}">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-flat btn-sm"><i class="fas fa-check-double"></i>
                            Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
