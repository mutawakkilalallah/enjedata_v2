@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data Pelajar</h3>
                </div>
                <form action="/pelajar/{{ $uuid }}/create" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input type="text" class="form-control form-control-sm @error('nisn') is-invalid @enderror"
                                id="nisn" value="{{ old('nisn') }}" name="nisn" autocomplete="off">
                            @error('nisn')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="lembaga_id">Lembaga</label>
                            <select class="form-control form-control-sm @error('lembaga_id') is-invalid @enderror"
                                id="lembaga_id" name="lembaga_id">
                                <option value="" selected>-- Pilih Lembaga --</option>
                                @foreach ($lembaga as $l)
                                    <option value="{{ $l->id }}">{{ $l->nama }}</option>
                                @endforeach
                            </select>
                            @error('lembaga_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kelas_id">Kelas</label>
                            <select class="form-control form-control-sm @error('kelas_id') is-invalid @enderror"
                                id="kelas_id" name="kelas_id">
                                <option value="" selected>-- Pilih Kelas --</option>
                            </select>
                            @error('kelas_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <input type="hidden" name="person_uuid" value="{{ $uuid }}">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-flat btn-sm"><i class="fas fa-check-double"></i>
                            Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#lembaga_id').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "/kelas/" + id,
                    method: "GET",
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].id + '>' + data[i]
                                .nama + '</option>';
                        }
                        $('#kelas_id').html(html);
                    }
                });
            });

        });
    </script>
@endsection
