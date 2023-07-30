@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data Pengurus</h3>
                </div>
                <form action="/pengurus/{{ $pengurus->pengurus_id }}/update" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="jabatan_id">Jabatan</label>
                            <select class="form-control form-control-sm @error('jabatan_id') is-invalid @enderror"
                                id="jabatan_id" name="jabatan_id">
                                <option value="{{ $pengurus->jabatan_id }}" selected>{{ $pengurus->jabatan_nama }}</option>
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
                    </div>
                    <input type="hidden" name="uuid" value="{{ $pengurus->person_uuid }}">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-flat btn-sm"><i class="fas fa-check-double"></i>
                            Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
