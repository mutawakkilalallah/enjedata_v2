<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
    <meta name="generator" content="Hugo 0.101.0" />
    <link rel="shortcut icon" href="../assets/brand/logo.png" type="image/x-icon" />
    <title>Kosmara | PP. Nurul Jadid Bali</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/checkout/" />
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

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

        <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
        <script type="text/javascript" src="https://app.midtrans.com/snap/snap.js"
            data-client-key="Mid-client-54qVfDnYlQ6MX24i"></script>
        <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    </head>

<body class="bg-light">
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" src="/assets/dist/img/nj.png" alt="" width="72"
                    height="72" />
                <h2>PP. Nurul Jadid Bali</h2>
                <p class="lead">
                    Jl. Raya Seririt Gilimanuk, Pemuteran, Gerokgak, Buleleng, Bali, ID.
                    81155
                </p>
            </div>

            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-success">Tagihan</span>
                    </h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">KOS MAKAN</h6>
                                <small
                                    class="text-muted">{{ Str::title($pembayaran->bulan) . ' ' . $pembayaran->tahun }}</small>
                            </div>
                            <span class="text-muted">Rp. 305.000</span>
                        </li>
                    </ul>
                    @if ($pembayaran->status === 'pembayaran')
                        <!-- Status Pembayaran Di Proses -->
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-success">Metode Pembayaran</span>
                        </h4>
                        @if ($transaction->payment_type === 'qris')
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex justify-content-between lh-sm">
                                    <div class="text-center">
                                        <h6 class="my-0">QRIS</h6>
                                        <img src="https://api.sandbox.midtrans.com/v2/qris/shopeepay/sppq_2327af8f-86ec-43fc-8872-435dd9a88550/qr-code"
                                            alt="" height="200" width="200">
                                    </div>
                                    <span class="text-muted">Shopee Pay</span>
                                </li>
                            </ul>
                        @else
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex justify-content-between lh-sm">
                                    <div>
                                        <h6 class="my-0">Virtual Account</h6>
                                        <small class="text-muted">{{ $transaction->va_number }}</small>
                                    </div>
                                    <span class="text-muted">{{ Str::upper($transaction->bank) }}</span>
                                </li>
                                </ @endif
                                <!-- Status Pembayaran Di Proses -->
                        @endif
                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3 text-success">Biodata Santri</h4>
                    <form class="needs-validation" novalidate>
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control form-control-sm border-0" id="nama"
                                    value="{{ $person->nama }}" disabled readonly />
                            </div>
                            <div class="col-sm-12">
                                <label for="niup" class="form-label">NIUP</label>
                                <input type="text" class="form-control form-control-sm border-0" id="niup"
                                    value="{{ $santri->niup }}" disabled readonly />
                            </div>
                            <div class="col-sm-6">
                                <label for="kamar" class="form-label">Kamar</label>
                                <input type="text" class="form-control form-control-sm border-0" id="kamar"
                                    value="{{ $domisili->kamar_nama }}" disabled readonly />
                            </div>
                            @if ($pembayaran->status === 'belum-lunas')
                                <div class="col-sm-6">
                                    <label for="status" class="form-label">Status</label>
                                    <p class="w-100 badge bg-danger" id="status" type="submit">
                                        {{ Str::upper($pembayaran->status) }}
                                    </p>
                                </div>
                            @elseif ($pembayaran->status === 'pembayaran')
                                <!-- Status Pembayaran Di Proses -->
                                <div class="col-sm-6">
                                    <label for="status" class="form-label">Status</label>
                                    <p class="w-100 badge bg-warning" id="status" type="submit">
                                        {{ Str::upper($pembayaran->status) }}
                                    </p>
                                </div>
                                <!-- Status Pembayaran Di Proses -->
                            @elseif ($pembayaran->status === 'lunas')
                                <!-- Status Pembayaran Berhasil -->
                                <div class="col-sm-6">
                                    <label for="status" class="form-label">Status</label>
                                    <p class="w-100 badge bg-success" id="status" type="submit">
                                        LUNAS
                                    </p>
                                </div>
                                <!-- Status Pembayaran Berhasil -->
                            @endif
                        </div>
                        <hr />
                        @if ($pembayaran->status === 'belum-lunas')
                            <button class="w-50 mb-5 btn btn-success btn-sm" id="pay-button" type="button">
                                Bayar Sekarang
                            </button>
                        @endif
                    </form>
                    <form action="/transaksi" id="form" method="post">
                        @csrf
                        <input type="hidden" id="json" name="json">
                    </form>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>

    @if ($pembayaran->status === 'belum-lunas')
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>

        <script type="text/javascript">
            // For example trigger on button clicked, or any time you need
            var payButton = document.getElementById('pay-button');
            payButton.addEventListener('click', function() {
                // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                window.snap.pay('{{ $snapToken }}', {
                    onSuccess: function(result) {
                        /* You may add your own implementation here */
                        alert("Pembayaran berhasil !");
                        sendResponse(result);
                    },
                    onPending: function(result) {
                        /* You may add your own implementation here */
                        alert("Transaksi berhasil, Silahkan lakukan pembayaran !");
                        sendResponse(result);
                    },
                    onError: function(result) {
                        /* You may add your own implementation here */
                        alert("Transaksi gagal");
                        // sendResponse(result);
                    },
                    onClose: function() {
                        /* You may add your own implementation here */
                        alert('Transaksi Dibatalkan');
                    }
                })
            });

            function sendResponse(result) {
                document.getElementById('json').value = JSON.stringify(result);
                $('#form').submit();
            }
        </script>
    @endif
</body>

</html>
