@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data User</h3>
                </div>
                <form action="/user/create" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="person_uuid">Provinsi</label>
                            <select class="form-control form-control-sm select2 @error('person_uuid') is-invalid @enderror"
                                id="person_uuid" name="person_uuid">
                                <option value="" selected>-- Pilih Person --</option>
                                @foreach ($persons as $p)
                                    <option value="{{ $p->uuid }}">{{ $p->nama }}</option>
                                @endforeach
                            </select>
                            @error('person_uuid')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text"
                                class="form-control form-control-sm @error('username') is-invalid @enderror" id="username"
                                value="{{ old('username') }}" name="username" autocomplete="off">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="role">Hak Akses</label>
                            <select class="form-control form-control-sm @error('role') is-invalid @enderror" id="role"
                                name="role">
                                <option value="" selected>-- Pilih Hak Akses --</option>
                                <option value="sysadmin">sysadmin</option>
                                <option value="admin">admin</option>
                                <option value="supervisor">supervisor</option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">password</label>
                            <input type="password"
                                class="form-control form-control-sm @error('password') is-invalid @enderror" id="password"
                                name="password" autocomplete="off">
                            @error('password')
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
