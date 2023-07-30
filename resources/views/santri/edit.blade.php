@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data Santri</h3>
                </div>
                <form action="/santri/{{ $santri->santri_id }}/update" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="wilayah_id">Wilayah</label>
                            <select class="form-control form-control-sm @error('wilayah_id') is-invalid @enderror"
                                id="wilayah_id" name="wilayah_id">
                                <option value="{{ $santri->wilayah_id }}" selected>{{ $santri->wilayah_nama }}</option>
                                @foreach ($wilayah as $w)
                                    <option value="{{ $w->id }}">{{ $w->nama }}</option>
                                @endforeach
                            </select>
                            @error('wilayah_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kamar_id">Kelas</label>
                            <select class="form-control form-control-sm @error('kamar_id') is-invalid @enderror"
                                id="kamar_id" name="kamar_id">
                                <option value="{{ $santri->kamar_id }}" selected>{{ $santri->kamar_nama }}</option>
                            </select>
                            @error('kamar_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <input type="hidden" name="uuid" value="{{ $santri->person_uuid }}">
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

            $('#wilayah_id').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "/kamar/" + id,
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
                        $('#kamar_id').html(html);
                    }
                });
            });

        });
    </script>
@endsection
