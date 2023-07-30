@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data Person</h3>
                </div>
                <form action="/person/create" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="no_kk">No KK</label>
                            <input type="text" class="form-control form-control-sm @error('no_kk') is-invalid @enderror"
                                id="no_kk" value="{{ old('no_kk') }}" name="no_kk" autocomplete="off">
                            @error('no_kk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control form-control-sm @error('nik') is-invalid @enderror"
                                id="nik" value="{{ old('nik') }}" name="nik" autocomplete="off">
                            @error('nik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control form-control-sm @error('nama') is-invalid @enderror"
                                id="nama" value="{{ old('nama') }}" name="nama" autocomplete="off">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text"
                                class="form-control form-control-sm @error('tempat_lahir') is-invalid @enderror"
                                id="tempat_lahir" value="{{ old('tempat_lahir') }}" name="tempat_lahir" autocomplete="off">
                            @error('tempat_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <div class="input-group">
                                <input type="date"
                                    class="form-control form-control-sm @error('tanggal_lahir') is-invalid @enderror"
                                    id="tanggal_lahir" value="{{ old('tanggal_lahir') }}" name="tanggal_lahir"
                                    autocomplete="off">
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control form-control-sm @error('jenis_kelamin') is-invalid @enderror"
                                id="jenis_kelamin" name="jenis_kelamin">
                                <option value="" selected>-- Pilih Jenis Kelamin --</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="prov_id">Provinsi</label>
                                    <select class="form-control form-control-sm @error('prov_id') is-invalid @enderror"
                                        id="prov_id" name="prov_id">
                                        <option value="" selected>-- Pilih Provinsi --</option>
                                        @foreach ($provinces as $prov)
                                            <option value="{{ $prov->prov_id }}">{{ $prov->prov_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('prov_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="kab_id">Kabupaten/Kota</label>
                                    <select class="form-control form-control-sm @error('kab_id') is-invalid @enderror"
                                        id="kab_id" name="kab_id">
                                        <option value="" selected>-- Pilih Kabupaten/Kota --</option>
                                    </select>
                                    @error('kab_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="kec_id">Kecamatan</label>
                                    <select class="form-control form-control-sm @error('kec_id') is-invalid @enderror"
                                        id="kec_id" name="kec_id">
                                        <option value="" selected>-- Pilih Kecamatan --</option>
                                    </select>
                                    @error('kec_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="desa_id">Desa/Kelurahan</label>
                                    <select class="form-control form-control-sm @error('desa_id') is-invalid @enderror"
                                        id="desa_id" name="desa_id">
                                        <option value="" selected>-- Pilih Desa/Kelurahan --</option>
                                    </select>
                                    @error('desa_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jalan">Jalan</label>
                            <input type="text"
                                class="form-control form-control-sm @error('jalan') is-invalid @enderror" id="jalan"
                                value="{{ old('jalan') }}" name="jalan" autocomplete="off">
                            @error('jalan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kode_pos">Kode Pos</label>
                            <input type="text"
                                class="form-control form-control-sm @error('kode_pos') is-invalid @enderror"
                                id="kode_pos" value="{{ old('kode_pos') }}" name="kode_pos" autocomplete="off">
                            @error('kode_pos')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-flat btn-sm"><i
                                class="fas fa-check-double"></i>
                            Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#prov_id').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "/cities/" + id,
                    method: "GET",
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].city_id + '>' + data[i]
                                .city_name + '</option>';
                        }
                        $('#kab_id').html(html);
                    }
                });
            });

            $('#kab_id').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "/districts/" + id,
                    method: "GET",
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].dis_id + '>' + data[i]
                                .dis_name + '</option>';
                        }
                        $('#kec_id').html(html);
                    }
                });
            });

            $('#kec_id').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "/subdistricts/" + id,
                    method: "GET",
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].subdis_id + '>' + data[i]
                                .subdis_name + '</option>';
                        }
                        $('#desa_id').html(html);
                    }
                });
            });

        });
    </script>
@endsection
