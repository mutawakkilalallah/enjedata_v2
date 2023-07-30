@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data Berkas</h3>
                </div>
                <form action="/document/{{ $uuid }}/create" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <img src="/assets/dist/img/no_photo.png" id="document-preview" class="img-thumbnail my-3"
                            style="height: 200px">
                        <div class="form-group">
                            <label for="path">File Berkas</label>
                            <input type="file" class="form-control-file @error('path') is-invalid @enderror"
                                id="path" name="path" autocomplete="off" onchange="previewDocument()">
                            @error('path')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="type">Jenis Berkas</label>
                            <select class="form-control form-control-sm @error('type') is-invalid @enderror" id="type"
                                name="type">
                                <option value="" selected>-- Pilih Jenis Berkas --</option>
                                <option value="foto-diri">foto-diri</option>
                                <option value="kartu-keluarga">kartu-keluarga</option>
                                <option value="akte">akte</option>
                                <option value="ijazah">ijazah</option>
                                <option value="berkas-lain">berkas-lain</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input type="hidden" name="person_uuid" value="{{ $uuid }}">
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-flat btn-sm"><i class="fas fa-check-double"></i>
                            Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    <script>
        function previewDocument() {
            const path = document.querySelector('#path');
            const documentPreview = document.querySelector('#document-preview');

            const OFReader = new FileReader();
            OFReader.readAsDataURL(path.files[0]);

            OFReader.onload = function(oFREvent) {
                documentPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
