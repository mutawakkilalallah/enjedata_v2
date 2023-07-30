@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (auth()->user()->role === 'sysadmin')
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Data User</h3>
                    </div>
                    <form action="/user/{{ $u->id }}/update" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="role">Hak Akses</label>
                                <select class="form-control form-control-sm @error('role') is-invalid @enderror"
                                    id="role" name="role">
                                    <option value="{{ $u->role }}" selected>{{ $u->role }}</option>
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
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-flat btn-sm"><i
                                    class="fas fa-check-double"></i>
                                Simpan</button>
                        </div>
                    </form>
                </div>
            @endif
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Update Password</h3>
                </div>
                <form action="/user/{{ $u->id }}/update-password" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
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
                            Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
