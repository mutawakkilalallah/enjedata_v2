<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        /* http://meyerweb.com/eric/tools/css/reset/
   v2.0 | 20110126
   License: none (public domain)
*/

        html,
        body,
        div,
        span,
        applet,
        object,
        iframe,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        blockquote,
        pre,
        a,
        abbr,
        acronym,
        address,
        big,
        cite,
        code,
        del,
        dfn,
        em,
        img,
        ins,
        kbd,
        q,
        s,
        samp,
        small,
        strike,
        strong,
        sub,
        sup,
        tt,
        var,
        b,
        u,
        i,
        center,
        dl,
        dt,
        dd,
        ol,
        ul,
        li,
        fieldset,
        form,
        label,
        legend,
        table,
        caption,
        tbody,
        tfoot,
        thead,
        tr,
        th,
        td,
        article,
        aside,
        canvas,
        details,
        embed,
        figure,
        figcaption,
        footer,
        header,
        hgroup,
        menu,
        nav,
        output,
        ruby,
        section,
        summary,
        time,
        mark,
        audio,
        video {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
        }

        /* HTML5 display-role reset for older browsers */
        article,
        aside,
        details,
        figcaption,
        figure,
        footer,
        header,
        hgroup,
        menu,
        nav,
        section {
            display: block;
        }

        body {
            line-height: 1;
        }

        ol,
        ul {
            list-style: none;
        }

        blockquote,
        q {
            quotes: none;
        }

        blockquote:before,
        blockquote:after,
        q:before,
        q:after {
            content: '';
            content: none;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }
    </style>
    <title>Kwitansi</title>
</head>

<body>
    <div style="text-align:center;margin-top:10px;font-family:'Courier New', Courier, monospace">
        <p style="font-size: 8px">KWITANSI PEMBAYARAN</p>
        <b style="font-size: 8px;font-weight:bold">PP. NURUL JADID BALI</b>
        <p style="font-size: 6px">Pemuteran, Gerokgak, Bali. ID. 81155</p>
        <p style="font-size: 10px">***************</p>
    </div>
    <div style="text-align:start;margin-top:10px;margin-left:5px;font-family:'Courier New', Courier, monospace">
        <p style="font-size: 8px">NAMA : {{ $pr->nama }}</p>
        <p style="font-size: 8px">NIUP : {{ $sn->niup }}</p>
        <p style="font-size: 8px">TANGGAL :
            {{ \Carbon\Carbon::create($tr->transaction_time)->isoFormat('D MMMM Y H:m:s') }}
        </p>
    </div>
    <p style="font-size: 6px;text-align:center;margin-top: 5px;">
        ============================================================</p>
    <div style="margin-top:10px;font-family:'Courier New', Courier, monospace">
        <p style="font-size: 8px;text-align:start;margin-left:5px;">KOS MAKAN
            {{ Str::title($pb->bulan) . ' ' . $pb->tahun }}</p>
        <p style="font-size: 8px;text-align:start;margin-left:5px;">@currency($pb->nominal) X 1</p>
    </div>
    <p style="font-size: 6px;text-align:center;margin-top: 5px;">
        ============================================================</p>
    <div style="margin-top:10px;font-family:'Courier New', Courier, monospace">
        <p style="font-size: 8px;text-align:start;margin-left:5px;">TOTAL : @currency($pb->nominal)</p>
        <p style="font-size: 8px;text-align:start;margin-left:5px;">STATUS : {{ Str::upper($pb->status) }}</p>
        <p style="font-size: 8px;text-align:start;margin-left:5px;">METODE PEMBAYARAN :
            {{ Str::upper($pb->metode) }}</p>
        <p style="font-size: 8px;text-align:start;margin-left:5px;">ID Transaksi : {{ $pb->id }}</p>
    </div>
    <div style="text-align: center;margin-top: 10px">
        <img src="https://api.qrserver.com/v1/create-qr-code/?size=60x60&data=https://enjebali.com/kosmara/{{ $pb->id }}/detail"
            alt="QRCode">
    </div>
    <div style="margin-top:10px;font-family:'Courier New', Courier, monospace">
        <p style="font-size: 6px;text-align:start;margin-left:5px;margin-right:5px;font-style:italic">Note : Scan QR
            Code untuk validasi
            keaslian kwitansi yang dikeluarkan oleh ENJEDATA by PP. Nurul Jadid Bali</p>
        <p style="font-size: 8px;text-align:center;margin-top:10px">ENJEDATA &copy; 2022 All Right Reserved</p>
    </div>
</body>

</html>
