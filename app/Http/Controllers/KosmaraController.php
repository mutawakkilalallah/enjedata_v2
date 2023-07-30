<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

class KosmaraController extends Controller
{
    public function waliSantri()
    {
        return view('walisantri');
    }

    public function santri(Request $request, $niup)
    {
        $santri = DB::table('santri')->where('niup', $niup)->first();
        $santriPerson = DB::table('persons')->where('uuid', $santri->person_uuid)
            ->join('cities', 'persons.kab_id', '=', 'city_id')
            ->first();
        $santriDomisili = DB::table('santri')
            ->join('wilayah', 'santri.wilayah_id', '=', 'wilayah.id')
            ->join('kamar', 'santri.kamar_id', '=', 'kamar.id')
            ->select('santri.*', 'wilayah.*', 'kamar.*', 'santri.id as santri_id', 'wilayah.nama as wilayah_nama', 'kamar.nama as kamar_nama')
            ->where('person_uuid', $santri->person_uuid)
            ->first();
        $fotoDiri = DB::table('documents')
            ->where('person_uuid', $santri->person_uuid)
            ->where('type', 'foto-diri')
            ->orderByDesc('created_at')
            ->first();
        $tagihan = DB::table('pembayaran')->where('person_uuid', $santri->person_uuid)
            ->orderByDesc('created_at')->get();

        $data = [
            'santri' => $santri,
            'santriPerson' => $santriPerson,
            'santriDomisili' => $santriDomisili,
            'fotoDiri' => $fotoDiri,
            'tagihan' => $tagihan
        ];
        return view('kosmara.santri', $data);
    }

    public function bayar($id)
    {
        $pembayaran =  DB::table('pembayaran')->where('id', $id)->first();
        $person =  DB::table('persons')->where('uuid', $pembayaran->person_uuid)->first();
        $santri =  DB::table('santri')->where('person_uuid', $pembayaran->person_uuid)->first();
        $domisili = DB::table('santri')
            ->join('wilayah', 'santri.wilayah_id', '=', 'wilayah.id')
            ->join('kamar', 'santri.kamar_id', '=', 'kamar.id')
            ->select('santri.*', 'wilayah.*', 'kamar.*', 'santri.id as santri_id', 'wilayah.nama as wilayah_nama', 'kamar.nama as kamar_nama')
            ->where('person_uuid', $person->uuid)
            ->first();

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'Mid-server-TB4t678L_WYi5AapSBBoLGR4';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = true;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;

        $params = [
            'transaction_details' => [
                'order_id' => $pembayaran->id,
                'gross_amount' => $pembayaran->nominal,
            ],
            "item_details" => [
                [
                    "id" => $pembayaran->id,
                    "price" => $pembayaran->nominal,
                    "quantity" => 1,
                    "name" => "KOS MAKAN"
                ],
            ],
            'customer_details' => [
                'first_name' => $person->nama,
            ]
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $data = [
            'pembayaran' => $pembayaran,
            'santri' => $santri,
            'person' => $person,
            'domisili' => $domisili,
            'snapToken' => $snapToken
        ];

        return view('kosmara.pembayaran', $data);
    }

    public function transaksi(Request $request)
    {
        $json = json_decode($request->input('json'));

        DB::table('transaction')->insert([
            "transaction_id" => $json->transaction_id,
            "status_code" => $json->status_code,
            "order_id" => $json->order_id,
            "gross_amount" => $json->gross_amount,
            "payment_type" => $json->payment_type,
            "transaction_time" => $json->transaction_time,
            "transaction_status" => $json->transaction_status,
            "bank" => $json->va_numbers[0]->bank,
            "va_number" => $json->va_numbers[0]->va_number,
        ]);

        if ($json->transaction_status === "settlement") {
            DB::table('pembayaran')->where('id', $json->order_id)->update(['status' => 'lunas', 'transaction_id' => $json->transaction_id, 'metode' => 'OTOMATIS']);
        } else if ($json->transaction_status === "pending") {
            DB::table('pembayaran')->where('id', $json->order_id)->update(['status' => 'pembayaran', 'transaction_id' => $json->transaction_id, 'metode' => 'OTOMATIS']);
        }

        $pembayaran = DB::table('pembayaran')->where('id', $json->order_id)->first();
        $santri = DB::table('santri')->where('person_uuid', $pembayaran->person_uuid)->first();

        return redirect('/kosmara' . '/' . $santri->niup . '/santri');
    }

    public function detail($id)
    {
        $pembayaran =  DB::table('pembayaran')->where('id', $id)->first();
        $person =  DB::table('persons')->where('uuid', $pembayaran->person_uuid)->first();
        $santri =  DB::table('santri')->where('person_uuid', $pembayaran->person_uuid)->first();
        $domisili = DB::table('santri')
            ->join('wilayah', 'santri.wilayah_id', '=', 'wilayah.id')
            ->join('kamar', 'santri.kamar_id', '=', 'kamar.id')
            ->select('santri.*', 'wilayah.*', 'kamar.*', 'santri.id as santri_id', 'wilayah.nama as wilayah_nama', 'kamar.nama as kamar_nama')
            ->where('person_uuid', $person->uuid)
            ->first();
        $transaction =  DB::table('transaction')->where('transaction_id', $pembayaran->transaction_id)->first();

        $data = [
            'pembayaran' => $pembayaran,
            'transaction' => $transaction,
            'santri' => $santri,
            'person' => $person,
            'domisili' => $domisili,
        ];

        return view('kosmara.pembayaran', $data);
    }

    public function notification(Request $request)
    {

        $json = json_decode($request->getContent());

        $mySignatureKey = hash('sha512', $json->order_id . $json->status_code . $json->gross_amount . 'Mid-server-TB4t678L_WYi5AapSBBoLGR4');

        if ($json->signature_key != $mySignatureKey) {
            abort(400, "Invalid Signature Key");
        }

        if ($json->transaction_status === "settlement") {
            DB::table('transaction')->where('transaction_id', $json->transaction_id)->update([
                "status_code" => $json->status_code,
                "transaction_time" => $json->settlement_time,
                "transaction_status" => $json->transaction_status,
            ]);

            DB::table('pembayaran')->where('id', $json->order_id)->update(['status' => 'lunas']);
        } else if ($json->transaction_status === "expire") {
            DB::table('transaction')->where('transaction_id', $json->transaction_id)->update([
                "status_code" => $json->status_code,
                "transaction_status" => $json->transaction_status,
            ]);
            DB::table('pembayaran')->where('id', $json->order_id)->update([
                'id' => Carbon::now()->timestamp,
                'status' => 'belum-lunas',
                'transaction_id' => null,
                'metode' => null,
            ]);
        }

        return $json;
    }

    public function cetakPDF($id)
    {
        $pembayaran = DB::table('pembayaran')->where('id', $id)->first();
        $transaction = DB::table('transaction')->where('transaction_id', $pembayaran->transaction_id)->first();
        $person = DB::table('persons')->where('uuid', $pembayaran->person_uuid)->first();
        $santri = DB::table('santri')->where('person_uuid', $pembayaran->person_uuid)->first();

        $data = [
            'pb' => $pembayaran,
            'tr' => $transaction,
            'pr' => $person,
            'sn' => $santri
        ];
        $options = new Options();
        $options->set(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $dompdf = new Dompdf($options);
        $html = view('invoice', $data);
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $customPaper = array(0, 0, 164.409, 283.465);
        $dompdf->setPaper($customPaper);

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream($person->nama . "-" . $id . ".pdf");
    }
}
