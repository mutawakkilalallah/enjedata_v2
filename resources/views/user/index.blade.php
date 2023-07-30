@extends('layouts.main')

@section('content')
    <a href="/user/create" class="btn btn-primary btn-flat btn-sm mb-3">
        <i class="fas fa-plus"></i> Tambah User
    </a>
    <div class="card text-xs">
        <div class="card-body">
            <table id="table1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>role</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $i => $u)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>@ {{ $u->username }}</td>
                            <td>{{ $u->role }}</td>
                            <td>
                                <a href="/user/{{ $u->id }}/edit" class="btn btn-primary btn-flat btn-xs">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
