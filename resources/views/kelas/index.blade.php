@extends('layouts.main')

@section('content')
    <a href="/kelas/create" class="btn btn-primary btn-flat btn-sm mb-3">
        <i class="fas fa-plus"></i> Tambah Kelas
    </a>
    <div class="card text-xs">
        <div class="card-body">
            <table id="table1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>lembaga</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelas as $i => $k)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $k->nama }}</td>
                            <td>{{ $k->lembaga }}</td>
                            <td>
                                <a href="/kelas/{{ $k->id }}/edit" class="btn btn-primary btn-flat btn-xs">
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
