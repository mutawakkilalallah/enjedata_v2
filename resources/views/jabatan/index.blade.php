@extends('layouts.main')

@section('content')
    <a href="/jabatan/create" class="btn btn-primary btn-flat btn-sm mb-3">
        <i class="fas fa-plus"></i> Tambah Jabatan
    </a>
    <div class="card text-xs">
        <div class="card-body">
            <table id="table1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Golongan</th>
                        <th>Nama</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jabatan as $i => $j)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $j->golongan }}</td>
                            <td>{{ $j->nama }}</td>
                            <td>
                                <a href="/jabatan/{{ $j->id }}/edit" class="btn btn-primary btn-flat btn-xs">
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
