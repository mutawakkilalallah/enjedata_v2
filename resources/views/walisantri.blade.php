<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ENJEDATA - Wali Santri</title>

    <link rel="shortcut icon" href="/assets/dist/img/enjedata-32.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css?v=3.2.0">
</head>

<body class="hold-transition login-page bg-dark" style="font-family: 'Inter', sans-serif;">
    <div class="login-box text-center">
        @if (session()->has('errorLogin'))
            <div class="alert bg-maroon alert-dismissible fade show" role="alert">
                {{ session('errorLogin') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card card-outline card-navy">
            <div class="card-header text-center">
                <img src="/assets/dist/img/enjedata-256.png" width="128px" class="mb-3" alt="">
                <br>
                <a href="/" class="h1 text-navy"><b>ENJEDATA</a>
            </div>
            <div class="card-body">
                <div class="input-group mb-3">
                    <input type="niup" class="form-control" name="niup" id="niup" placeholder="Masukkan NIUP"
                        autocomplete="off" autofocus onchange="changeForm()">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-users"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="#" id="link" class="btn bg-navy btn-block"><i
                                class="fas fa-sign-in-alt"></i>
                            MASUK</a>
                    </div>
                </div>
                <p class="mt-4 mb-1 text-secondary" style="font-weight: 400">Developed by <b>@mutawakkilalallah</b></p>
                <p class="text-secondary" style="font-weight: 400">Build 2208.02.2.1.5</p>
            </div>

        </div>

    </div>


    <script src="/assets/plugins/jquery/jquery.min.js"></script>

    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="/assets/dist/js/adminlte.min.js?v=3.2.0"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function changeForm() {
            const niup = $('#niup').val();
            $('#link').attr('href', '/kosmara/' + niup + '/santri');
        }
    </script>
</body>

</html>
