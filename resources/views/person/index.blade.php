@extends('layouts.main')

@section('content')
    <div class="card text-xs">
        <div class="card-body">
            <table id="table1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Gender</th>
                        <th>Tgl Lahir</th>
                        <th>Kecamatan</th>
                        <th>Tgl Update Bio</th>
                        <th>Tgl Input Bio</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($persons as $i => $p)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $p->nik }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->jenis_kelamin }}</td>
                            <td>{{ \Carbon\Carbon::create($p->tanggal_lahir)->isoFormat('D MMMM Y') }}</td>
                            <td>{{ $p->dis_name }}</td>
                            <td>{{ \Carbon\Carbon::create($p->created_at)->isoFormat('D MMM Y H:m:s') }}</td>
                            <td>{{ \Carbon\Carbon::create($p->updated_at)->isoFormat('D MMM Y H:m:s') }}</td>
                            <td>
                                <a href="/person/{{ $p->uuid }}/detail" class="btn btn-primary btn-flat btn-xs">
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
