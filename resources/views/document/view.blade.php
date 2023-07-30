@extends('layouts.main')

@section('content')
    <div class="row">
        @foreach ($documents as $d)
            <div class="col-sm-3 text-center mb-2">
                <img src="{{ asset('storage/' . $d->path) }}" alt="" class="img-thumbnail" style="height: 150px">
                <br>
                <a href="/document/{{ $d->id }}/download" class="badge badge-success mt-3"><i
                        class="fas fa-download"></i></a>
                <a href="{{ asset('storage/' . $d->path) }}" target="_blank" class="badge badge-info mt-3"><i
                        class="fas fa-eye"></i></a>
            </div>
        @endforeach
    </div>
@endsection
