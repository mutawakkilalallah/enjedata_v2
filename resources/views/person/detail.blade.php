@extends('layouts.main')

@section('content')
    <div class="card card-primary card-tabs text-xs">
        <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                <li class="pt-2 px-3">
                    <h3 class="card-title"></h3>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-two-biodata-tab" data-toggle="pill"
                        href="#custom-tabs-two-biodata" role="tab" aria-controls="custom-tabs-two-biodata"
                        aria-selected="true">Biodata</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-berkas-tab" data-toggle="pill" href="#custom-tabs-two-berkas"
                        role="tab" aria-controls="custom-tabs-two-berkas" aria-selected="false">Berkas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-domisili-tab" data-toggle="pill"
                        href="#custom-tabs-three-domisili" role="tab" aria-controls="custom-tabs-three-domisili"
                        aria-selected="false">Domisili</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-pendidikan-tab" data-toggle="pill"
                        href="#custom-tabs-four-pendidikan" role="tab" aria-controls="custom-tabs-four-pendidikan"
                        aria-selected="false">Pendidikan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-five-pengurus-tab" data-toggle="pill"
                        href="#custom-tabs-five-pengurus" role="tab" aria-controls="custom-tabs-five-pengurus"
                        aria-selected="false">Pengurus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-six-karyawan-tab" data-toggle="pill"
                        href="#custom-tabs-six-karyawan" role="tab" aria-controls="custom-tabs-six-karyawan"
                        aria-selected="false">Karyawan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-seven-pembayaran-tab" data-toggle="pill"
                        href="#custom-tabs-seven-pembayaran" role="tab" aria-controls="custom-tabs-seven-pembayaran"
                        aria-selected="false">Pembayaran</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-two-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-two-biodata" role="tabpanel"
                    aria-labelledby="custom-tabs-two-biodata-tab">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="no_kk" class="col-sm-3 col-form-label">No
                                        KK</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control-plaintext text-white text-xs"
                                            id="no_kk" value="{{ $p->no_kk }}" disabled readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control-plaintext text-white text-xs"
                                            id="nik" value="{{ $p->nik }}" disabled readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control-plaintext text-white text-xs"
                                            id="nama" value="{{ $p->nama }}" disabled readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis
                                        Kelamin</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control-plaintext text-white text-xs"
                                            id="jenis_kelamin"
                                            value="{{ $p->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}" disabled
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tetala" class="col-sm-3 col-form-label">Tempat,
                                        Tanggal Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control-plaintext text-white text-xs"
                                            id="tetala"
                                            value="{{ $p->tempat_lahir . ', ' . \Carbon\Carbon::create($p->tanggal_lahir)->isoFormat('D MMM Y') }}"
                                            disabled readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="umur" class="col-sm-3 col-form-label">Umur</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control-plaintext text-white text-xs"
                                            id="umur"
                                            value="{{ \Carbon\Carbon::create($p->tanggal_lahir)->age . ' Tahun' }}"
                                            disabled readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="#" class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control-plaintext text-white text-xs"
                                            id="#" disabled readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jalan" class="col-sm-3 col-form-label">Jalan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control-plaintext text-white text-xs"
                                            id="jalan" value="{{ $p->jalan }}" disabled readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="desa" class="col-sm-3 col-form-label">Desa</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control-plaintext text-white text-xs"
                                            id="desa" value="{{ $p->subdis_name }}" disabled readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control-plaintext text-white text-xs"
                                            id="kecamatan" value="{{ $p->dis_name }}" disabled readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kabupaten" class="col-sm-3 col-form-label">Kabupaten</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control-plaintext text-white text-xs"
                                            id="kabupaten" value="{{ $p->city_name }}" disabled readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="provinsi" class="col-sm-3 col-form-label">Provinsi</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control-plaintext text-white text-xs"
                                            id="provinsi" value="{{ $p->prov_name }}" disabled readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kode_pos" class="col-sm-3 col-form-label">Kode
                                        Pos</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control-plaintext text-white text-xs"
                                            id="kode_pos" value="{{ $p->kode_pos }}" disabled readonly>
                                    </div>
                                </div>
                                @if ((auth()->user()->role === 'sysadmin') | (auth()->user()->role === 'admin'))
                                    <a href="/person/{{ $p->uuid }}/edit"
                                        class="btn btn-primary btn-sm btn-flat float-left"><i class="fas fa-file-alt"></i>
                                        Buka Formulir</a>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-3">
                            @if ($fd)
                                <img src="{{ asset('storage/' . $fd->path) }}" alt="" class="img-thumbnail"
                                    style="height: 180px">
                            @else
                                <img src="/assets/dist/img/no_photo.png" alt="" class="img-thumbnail"
                                    style="height: 180px">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="custom-tabs-two-berkas" role="tabpanel"
                    aria-labelledby="custom-tabs-two-berkas-tab">
                    <div class="row">
                        @foreach ($documents as $d)
                            <div class="col-sm-4 text-center">
                                <img src="{{ asset('storage/' . $d->path) }}" alt="" class="img-thumbnail"
                                    style="height: 180px">
                                <br>
                                <a href="/document/{{ $d->id }}/download" class="badge badge-success mt-3"><i
                                        class="fas fa-download"></i></a>
                                <a href="{{ asset('storage/' . $d->path) }}" target="_blank"
                                    class="badge badge-info mt-3"><i class="fas fa-eye"></i></a>
                                <p class="badge badge-info mt-3">{{ $d->type }}</p>
                                @if ((auth()->user()->role === 'sysadmin') | (auth()->user()->role === 'admin'))
                                    <a href="/document/{{ $d->id }}/delete" class="badge badge-danger mt-3"><i
                                            class="fas fa-trash"></i></a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    @if ((auth()->user()->role === 'sysadmin') | (auth()->user()->role === 'admin'))
                        <a href="/document/{{ $p->uuid }}/create"
                            class="btn btn-primary btn-sm btn-flat float-left mt-3"><i class="fas fa-file-alt"></i>
                            Upload Berkas</a>
                    @endif
                </div>
                <div class="tab-pane fade" id="custom-tabs-three-domisili" role="tabpanel"
                    aria-labelledby="custom-tabs-three-domisili-tab">
                    @if ($domisili)
                        <div>
                            <small class="badge bg-gradient-navy">NIUP : {{ $domisili->niup }}</small>
                            <h6 class="ml-1 mb-0">{{ $domisili->wilayah_nama }} - {{ $domisili->kamar_nama }}</h6>
                            @if ((auth()->user()->role === 'sysadmin') | (auth()->user()->role === 'admin'))
                                <a href="/santri/{{ $domisili->santri_id }}/edit"
                                    class="badge bg-gradient-warning ml-1">Edit</a>
                            @endif
                        </div>
                    @endif
                    @if ((auth()->user()->role === 'sysadmin') | (auth()->user()->role === 'admin'))
                        <a href="/santri/{{ $p->uuid }}/create"
                            class="btn btn-primary btn-sm btn-flat float-left mt-3"><i class="fas fa-hotel"></i>
                            Tambah Wilayah</a>
                    @endif
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-pendidikan" role="tabpanel"
                    aria-labelledby="custom-tabs-four-pendidikan-tab">
                    @if ($pendidikan)
                        <div>
                            <small class="badge bg-gradient-navy">NISN : {{ $pendidikan->nisn }}</small>
                            <h6 class="ml-1 mb-0">{{ $pendidikan->kelas_nama }} - {{ $pendidikan->lembaga_nama }}</h6>
                            <p class="ml-1 mb-0">{{ $pendidikan->nis }}</p>
                            @if ((auth()->user()->role === 'sysadmin') | (auth()->user()->role === 'admin'))
                                <a href="/pelajar/{{ $pendidikan->pelajar_id }}/edit"
                                    class="badge bg-gradient-warning ml-1">Edit</a>
                            @endif
                        </div>
                    @endif
                    @if ((auth()->user()->role === 'sysadmin') | (auth()->user()->role === 'admin'))
                        <a href="/pelajar/{{ $p->uuid }}/create"
                            class="btn btn-primary btn-sm btn-flat float-left mt-3"><i class="fas fa-landmark"></i>
                            Tambah Pendidikan</a>
                    @endif
                </div>
                <div class="tab-pane fade" id="custom-tabs-five-pengurus" role="tabpanel"
                    aria-labelledby="custom-tabs-five-pengurus-tab">
                    @if ($pengurus)
                        <div>
                            <small class="badge bg-gradient-navy">NIP : {{ $pengurus->nip }}</small>
                            <h6 class="ml-1 mb-0">{{ $pengurus->jabatan_nama }}</h6>
                            @if ((auth()->user()->role === 'sysadmin') | (auth()->user()->role === 'admin'))
                                <a href="/pengurus/{{ $pengurus->pengurus_id }}/edit"
                                    class="badge bg-gradient-warning ml-1">Edit</a>
                            @endif
                        </div>
                    @endif
                    @if ((auth()->user()->role === 'sysadmin') | (auth()->user()->role === 'admin'))
                        <a href="/pengurus/{{ $p->uuid }}/create"
                            class="btn btn-primary btn-sm btn-flat float-left mt-3"><i class="fas fa-user-md"></i>
                            Tambah Jabatan</a>
                    @endif
                </div>
                <div class="tab-pane fade" id="custom-tabs-six-karyawan" role="tabpanel"
                    aria-labelledby="custom-tabs-six-karyawan-tab">
                    @if ($karyawan)
                        <div>
                            <small class="badge bg-gradient-navy">NIP : {{ $karyawan->nip }}</small>
                            <h6 class="ml-1 mb-0">{{ $karyawan->jabatan_nama }}
                                {{ $karyawan->ket ? ' - ' . $karyawan->ket : '' }}</h6>
                            @if ((auth()->user()->role === 'sysadmin') | (auth()->user()->role === 'admin'))
                                <a href="/karyawan/{{ $karyawan->karyawan_id }}/edit"
                                    class="badge bg-gradient-warning ml-1">Edit</a>
                            @endif
                        </div>
                    @endif
                    @if ((auth()->user()->role === 'sysadmin') | (auth()->user()->role === 'admin'))
                        <a href="/karyawan/{{ $p->uuid }}/create"
                            class="btn btn-primary btn-sm btn-flat float-left mt-3"><i class="fas fa-user-tie"></i>
                            Tambah Jabatan</a>
                    @endif
                </div>
                <div class="tab-pane fade" id="custom-tabs-seven-pembayaran" role="tabpanel"
                    aria-labelledby="custom-tabs-seven-pembayaran-tab">
                    @if ($pembayaran)
                        <div class="row">
                            @foreach ($pembayaran as $pb)
                                <div class="col-md-4 mb-5">
                                    @if ($pb->status === 'belum-lunas')
                                        <small class="ml-1 badge bg-gradient-danger">STATUS :
                                            {{ Str::upper($pb->status) }}</small>
                                    @elseif ($pb->status === 'pembayaran')
                                        <small class="ml-1 badge bg-gradient-warning">STATUS :
                                            {{ Str::upper($pb->status) }}</small>
                                    @else
                                        <small class="ml-1 badge bg-gradient-success">STATUS :
                                            {{ Str::upper($pb->status) }}</small>
                                    @endif
                                    <h6 class="ml-1 mb-0">
                                        {{ 'Kos Makan - ' . Str::title($pb->bulan) . ' ' . $pb->tahun }}</h6>
                                    <p class="ml-1 mb-0">@currency($pb->nominal)</p>
                                    @if ((auth()->user()->role === 'sysadmin') | (auth()->user()->role === 'admin'))
                                        @if ($pb->status === 'belum-lunas')
                                            <a href="/pembayaran/{{ $pb->id }}/hapus"
                                                class="badge bg-gradient-danger ml-1">Hapus</a>
                                            <a href="/pembayaran/{{ $pb->id }}/lunas-manual"
                                                class="badge bg-gradient-navy ml-1">Pelunasan Manual</a>
                                            <a href="/kosmara/{{ $pb->id }}/bayar"
                                                class="badge bg-gradient-orange ml-1">Pelunasan via Bank</a>
                                        @elseif($pb->status === 'pembayaran')
                                            <a href="/kosmara/{{ $pb->id }}/detail"
                                                class="badge bg-gradient-info ml-1">Detail</a>
                                        @elseif($pb->status === 'lunas')
                                            <a href="/kosmara/{{ $pb->id }}/detail"
                                                class="badge bg-gradient-success ml-1">Lihat</a>
                                            <a href="/kosmara/{{ $pb->id }}/cetak-pdf"
                                                class="badge bg-gradient-orange ml-1">Download Kwitansi</a>
                                        @endif
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                    @if ((auth()->user()->role === 'sysadmin') | (auth()->user()->role === 'admin'))
                        @if ($p->is_kosmara === null)
                            <form action="/peserta-kosmara/create" method="POST">
                                @csrf
                                <input type="hidden" name="uuid" value="{{ $p->uuid }}">
                                <input type="hidden" name="niup" value="{{ !$domisili ? null : $domisili->niup }}">
                                <button type="submit" class="btn btn-success btn-sm btn-flat float-left mt-3"><i
                                        class="fas fa-utensils"></i>
                                    Aktifkan Pembayaran Kos Makan</button>
                            </form>
                        @elseif ($p->is_kosmara === 'Y')
                            <a href="/buat-tagihan/{{ $p->uuid }}"
                                class="btn btn-primary btn-sm btn-flat float-left mt-3"><i class="fas fa-utensils"></i>
                                Tambah Pembayaran</a>
                            </form>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
