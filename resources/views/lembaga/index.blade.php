@extends('layouts.main')

@section('content')
    <a href="/lembaga/create" class="btn btn-primary btn-flat btn-sm mb-3">
        <i class="fas fa-plus"></i> Tambah Lembaga
    </a>
    <div class="card text-xs">
        <div class="card-body">
            <table id="table1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lembaga as $i => $l)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $l->nama }}</td>
                            <td>
                                <a href="/lembaga/{{ $l->id }}/edit" class="btn btn-primary btn-flat btn-xs">
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
