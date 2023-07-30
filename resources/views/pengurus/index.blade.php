@extends('layouts.main')

@section('content')
    <div class="card text-xs">
        <div class="card-body">
            <table id="table1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengurus as $i => $p)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $p->nip }}</td>
                            <td>{{ $p->persons_nama }}</td>
                            <td>{{ $p->jabatan_nama }}</td>
                            <td>
                                <a href="/person/{{ $p->person_uuid }}/detail" class="btn btn-primary btn-flat btn-xs">
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
