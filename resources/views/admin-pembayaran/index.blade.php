@extends('layouts.main')

@section('content')
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
                    @foreach ($pesertaKosmara as $i => $pk)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $pk->nama }}</td>
                            <td>
                                <a href="/person/{{ $pk->uuid }}/detail" class="btn btn-primary btn-flat btn-xs">
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
