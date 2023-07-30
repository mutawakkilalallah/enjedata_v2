@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-navy elevation-1"><i class="fas fa-user"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Person</span>
                    <span class="info-box-number">
                        {{ $person }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Santri</span>
                    <span class="info-box-number">
                        {{ $santri }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-olive elevation-1"><i class="fas fa-user-graduate"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Pelajar</span>
                    <span class="info-box-number">
                        {{ $pelajar }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-black elevation-1"><i class="fas fa-user-md"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Pengurus</span>
                    <span class="info-box-number">
                        {{ $pengurus }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-orange elevation-1"><i class="fas fa-user-tie"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Karyawan</span>
                    <span class="info-box-number">
                        {{ $karyawan }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-indigo elevation-1"><i class="far fa-images"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Foto Diri</span>
                    <span class="info-box-number">
                        {{ $foto_diri }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-danger elevation-1"><i class="fas fa-file"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Kartu Keluarga</span>
                    <span class="info-box-number">
                        {{ $kartu_keluarga }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-info elevation-1"><i class="fas fa-id-card"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Akte</span>
                    <span class="info-box-number">
                        {{ $akte }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-gray elevation-1"><i class="fas fa-certificate"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Ijazah</span>
                    <span class="info-box-number">
                        {{ $ijazah }}
                    </span>
                </div>
            </div>
        </div>
        @if ((auth()->user()->role === 'sysadmin') | (auth()->user()->role === 'admin'))
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-gradient-maroon elevation-1"><i class="fas fa-user-cog"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">User</span>
                        <span class="info-box-number">
                            {{ $user }}
                        </span>
                    </div>
                </div>
            </div>
        @endif
        @if (auth()->user()->role === 'sysadmin')
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-gradient-teal elevation-1"><i class="fas fa-campground"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Kamar</span>
                        <span class="info-box-number">
                            {{ $kamar }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-gradient-pink elevation-1"><i class="fas fa-hotel"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Wilayah</span>
                        <span class="info-box-number">
                            {{ $wilayah }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-gradient-warning elevation-1"><i class="fas fa-store"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Kelas</span>
                        <span class="info-box-number">
                            {{ $kelas }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-gradient-purple elevation-1"><i class="fas fa-landmark"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Lembaga</span>
                        <span class="info-box-number">
                            {{ $lembaga }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-gradient-light elevation-1"><i class="fas fa-random"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Jabatan</span>
                        <span class="info-box-number">
                            {{ $jabatan }}
                        </span>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
