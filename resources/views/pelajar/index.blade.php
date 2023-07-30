@extends('layouts.main')

@section('content')
    <div class="card text-xs">
        <div class="card-body">
            <table id="table1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NISN</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Lembaga</th>
                        <th>Kelas</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelajar as $i => $p)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $p->nisn }}</td>
                            <td>{{ $p->nis }}</td>
                            <td>{{ $p->persons_nama }}</td>
                            <td>{{ $p->lembaga_nama }}</td>
                            <td>{{ $p->kelas_nama }}</td>
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
