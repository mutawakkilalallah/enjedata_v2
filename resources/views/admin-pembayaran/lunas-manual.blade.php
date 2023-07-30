@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data Pembayaran</h3>
                </div>
                <form action="/pembayaran/{{ $id }}/lunas-manual" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="callout callout-danger">
                            <h5>Apakah anda yakin ?</h5>
                            <p>Setelah pembayaran di lunasi secara manual tidak ada tersedia lagi semua fitur pembayaran dan
                                tidak bisa di ubah kecuali oleh admin sistem</p>
                        </div>
                        <input type="hidden" name="person_uuid" value="{{ $pembayaran->person_uuid }}">
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-flat btn-sm"><i class="fas fa-check-double"></i>
                            Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
