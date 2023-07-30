@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-navy elevation-1"><i class="far fa-credit-card"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Pembayaran</span>
                    <span class="info-box-number">
                        @currency($totalPembayaran)
                    </span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-danger elevation-1"><i class="fas fa-times"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Belum Lunas</span>
                    <span class="info-box-number">
                        @currency($totalBelumBayar)
                    </span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-success elevation-1"><i class="fas fa-check-double"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Lunas</span>
                    <span class="info-box-number">
                        @currency($totalBayar)
                    </span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-teal elevation-1"><i class="fas fa-university"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Otomatis</span>
                    <span class="info-box-number">
                        @currency($totalBayarOtamatis)
                    </span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-pink elevation-1"><i class="fas fa-coins"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Manual</span>
                    <span class="info-box-number">
                        @currency($totalBayarManual)
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-gradient-navy">
            <h5 class="card-title">Pilih Periode</h5>
        </div>
        <div class="card-body">
            <form action="/laporan-kosmara" method="GET">
                <div class="row">
                    <div class="col-md-6 align-self-end">
                        <div class="form-group">
                            <label for="bulan">Bulan</label>
                            <select class="form-control form-control-sm" id="bulan" name="bulan">
                                <option value="{{ request()->get('bulan') }}" selected>
                                    {{ Str::title(request()->get('bulan')) }}
                                </option>
                                <option value="januari">Januari</option>
                                <option value="februari">Februari</option>
                                <option value="maret">Maret</option>
                                <option value="april">April</option>
                                <option value="mei">Mei</option>
                                <option value="juni">Juni</option>
                                <option value="juli">Juli</option>
                                <option value="agustus">Agustus</option>
                                <option value="september">September</option>
                                <option value="oktober">Oktober</option>
                                <option value="november">November</option>
                                <option value="desember">Desember</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 align-self-end">
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <select class="form-control form-control-sm" id="tahun" name="tahun">
                                <option value="{{ request()->get('tahun') }}" selected>{{ request()->get('tahun') }}
                                </option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>
    </div>

    <div class="card text-xs">
        <div class="card-body">
            <table id="table1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nominal</th>
                        <th>Status</th>
                        <th>Metode Pembayaran</th>
                        <th>Keterangan</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporanKosmara as $i => $lk)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $lk->nama }}</td>
                            <td>@currency($lk->nominal)</td>
                            <td>{{ Str::upper($lk->status) }}</td>
                            <td>{{ $lk->metode ? $lk->metode : '-' }}</td>
                            <td>{{ 'Kos Makan - ' . Str::title($lk->bulan) . ' ' . $lk->tahun }}</td>
                            <td>
                                <a href="/person/{{ $lk->person_uuid }}/detail" class="btn btn-primary btn-flat btn-xs">
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
