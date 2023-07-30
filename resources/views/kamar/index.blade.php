@extends('layouts.main')

@section('content')
    <a href="/kamar/create" class="btn btn-primary btn-flat btn-sm mb-3">
        <i class="fas fa-plus"></i> Tambah Kamar
    </a>
    <div class="card text-xs">
        <div class="card-body">
            <table id="table1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Wilayah</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kamar as $i => $k)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $k->nama }}</td>
                            <td>{{ $k->wilayah }}</td>
                            <td>
                                <a href="/kamar/{{ $k->id }}/edit" class="btn btn-primary btn-flat btn-xs">
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
