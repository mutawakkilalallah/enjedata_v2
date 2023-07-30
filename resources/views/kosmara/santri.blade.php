<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
    <meta name="generator" content="Hugo 0.101.0" />
    <link rel="shortcut icon" href="/assets/dist/img/nj.png" type="image/x-icon" />
    <title>Kosmara | PP. Nurul Jadid Bali</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/heroes/" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/assets/dist/css/heroes.css" rel="stylesheet" />
</head>

<body>
    <main>
        <div class="px-4 py-5 my-5 text-center">
            @if ($fotoDiri)
                <img class="d-block mx-auto mb-4 rounded-circle"
                    src="{{ 'https://enjebali.com/storage/' . $fotoDiri->path }}" alt="" width="100"
                    height="100" style="object-fit: cover" />
            @else
                <img class="d-block mx-auto mb-4 rounded-circle" src="/assets/dist/img/no_photo.png" alt=""
                    width="100" height="100" style="object-fit: cover" />
            @endif
            <h1 class="display-5 fw-bold">{{ $santriPerson->nama }}</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">
                    <b>NIUP</b> : {{ $santri->niup }} | <b>Kamar</b> : {{ $santriDomisili->kamar_nama }} |
                    <b>Alamat</b> : {{ $santriPerson->city_name }}
                </p>
            </div>
        </div>

        <div class="container px-4 pb-5" id="hanging-icons">
            <h2 class="pb-2 border-bottom">PEMBAYARAN</h2>
            <div class="row g-4 py-2 row-cols-1 row-cols-lg-3">
                @foreach ($tagihan as $t)
                    <div class="col d-flex align-items-start">
                        <div>
                            <h2>Kos Makan</h2>
                            <p class="mb-1">Bulan : {{ Str::title($t->bulan) . ' ' . $t->tahun }}</p>
                            <p class="mb-1">@currency($t->nominal)</p>
                            <p class="mb-1">
                                Status : <span
                                    class="badge {{ $t->status === 'belum-lunas' ? 'bg-danger' : ($t->status === 'pembayaran' ? 'bg-warning' : 'bg-success') }}">{{ Str::upper($t->status) }}</span>
                            </p>
                            @if ($t->status === 'belum-lunas')
                                <a href="/kosmara/{{ $t->id }}/bayar"
                                    class="btn btn-sm btn-success mt-3">BAYAR</a>
                            @elseif($t->status === 'pembayaran')
                                <a href="/kosmara/{{ $t->id }}/detail"
                                    class="btn btn-sm btn-info mt-3">DETAIL</a>
                            @elseif($t->status === 'lunas')
                                <a href="/kosmara/{{ $t->id }}/detail"
                                    class="btn btn-sm btn-success mt-3">LIHAT</a>
                                <a href="/kosmara/{{ $t->id }}/cetak-pdf"
                                    class="btn btn-sm btn-warning mt-3">Download Kwitansi</a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>
