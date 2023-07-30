@extends('layouts.main')

@section('content')
    <div class="card text-xs">
        <div class="card-body">
            <table id="table1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIUP</th>
                        <th>Nama</th>
                        <th>Wilayah</th>
                        <th>Kamar</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($santri as $i => $s)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $s->niup }}</td>
                            <td>{{ $s->persons_nama }}</td>
                            <td>{{ $s->wilayah_nama }}</td>
                            <td>{{ $s->kamar_nama }}</td>
                            <td>
                                <a href="/person/{{ $s->person_uuid }}/detail" class="btn btn-primary btn-flat btn-xs">
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
