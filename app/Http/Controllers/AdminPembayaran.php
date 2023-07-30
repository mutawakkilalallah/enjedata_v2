<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPembayaran extends Controller
{
    public function pesertaKosmara()
    {
        $data = [
            'title' => 'Data Peserta Kosmara',
            'pesertaKosmara' => DB::table('persons')->where('is_kosmara', "Y")->orderByDesc('updated_at')->get(),
        ];

        return view('admin-pembayaran.index', $data);
    }

    public function laporanKosmara(Request $request)
    {
        $data = [
            'title' => 'Laporan Kos Makan - ' . Str::title(request()->get('bulan')) . " " . request()->get('tahun'),
            'laporanKosmara' => DB::table('pembayaran')->where('bulan', request()->get('bulan'))->where('tahun', request()->get('tahun'))
                ->join('persons', 'pembayaran.person_uuid', 'uuid')
                ->orderByDesc('pembayaran.updated_at')
                ->get(),
            'totalPembayaran' => DB::table('pembayaran')->where('bulan', request()->get('bulan'))->where('tahun', request()->get('tahun'))->sum('nominal'),
            'totalBelumBayar' => DB::table('pembayaran')->where('bulan', request()->get('bulan'))->where('tahun', request()->get('tahun'))->whereIn('status', ['belum-lunas', 'pembayaran'])->sum('nominal'),
            'totalBayar' => DB::table('pembayaran')->where('bulan', request()->get('bulan'))->where('tahun', request()->get('tahun'))->where('status', 'lunas')->sum('nominal'),
            'totalBayarOtamatis' => DB::table('pembayaran')->where('bulan', request()->get('bulan'))->where('tahun', request()->get('tahun'))->where('status', 'lunas')->where('metode', 'OTOMATIS')->sum('nominal'),
            'totalBayarManual' => DB::table('pembayaran')->where('bulan', request()->get('bulan'))->where('tahun', request()->get('tahun'))->where('status', 'lunas')->where('metode', 'MANUAL')->sum('nominal'),
        ];

        return view('admin-pembayaran.laporan', $data);
    }

    public function createPesertaKosmara(Request $request)
    {
        if ($request->input('niup') === null) {

            $request->session()->flash('invalidTagihan', 'Belum terdaftar sebagai santri karena kamar belum di tentukan');

            return redirect('/person' . "/" . $request->input('uuid') . "/detail");
        }

        $person = [
            'is_kosmara' => "Y",
            'updated_by' => auth()->user()->person_uuid,
            'updated_at' => new DateTime()
        ];

        DB::table('persons')->where('uuid', $request->input('uuid'))->update($person);

        $request->session()->flash('success', 'Pembayaran berhasil diaktifkan');

        return redirect('/person' . "/" . $request->input('uuid') . "/detail");
    }

    public function buatPembayaran($uuid)
    {
        $data = [
            'title' => 'Buat Pembayaran',
            'uuid' => $uuid,
        ];

        return view('admin-pembayaran.create', $data);
    }

    public function simpanPembayaran(Request $request, $uuid)
    {
        $validated = $request->validate([
            'person_uuid' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'nominal' => 'required',
        ]);

        $validated['id'] = Carbon::now()->timestamp;
        $validated['status'] = "belum-lunas";
        $validated['created_by'] = auth()->user()->person_uuid;
        $validated['updated_by'] = auth()->user()->person_uuid;
        $validated['created_at'] = new DateTime();
        $validated['updated_at'] = new DateTime();

        DB::table('pembayaran')->insert($validated);

        $request->session()->flash('success', 'Pembayaran berhasil ditambahkan');

        return redirect('/person' . "/" . $uuid . "/detail");
    }

    public function deletePembayaran(Request $request, $id)
    {
        $pembayaran = DB::table('pembayaran')->where('id', $id)->first();

        DB::table('pembayaran')->where('id', $id)->delete();

        $request->session()->flash('success', 'Pembayaran berhasil dihapus');

        return redirect('/person' . "/" . $pembayaran->person_uuid . "/detail");
    }

    public function lunasManual($id)
    {
        $data = [
            'title' => 'Pelunasan Manual',
            'id' => $id,
            'pembayaran' => DB::table('pembayaran')->where('id', $id)->first()
        ];

        return view('admin-pembayaran.lunas-manual', $data);
    }


    public function lunas(Request $request, $id)
    {
        $uuid = Str::uuid();

        $pembayaran = DB::table('pembayaran')->where('id', $id)->first();

        $transaction = DB::table('transaction')->insert([
            'transaction_id' => $uuid,
            'order_id' => $id,
            'gross_amount' => $pembayaran->nominal,
            'payment_type' => "MANUAL",
            'transaction_time' => new DateTime(),
            'transaction_status' => "settlement"
        ]);

        DB::table('pembayaran')->where('id', $id)->update(['status' => 'lunas', 'transaction_id' => $uuid, 'metode' => 'MANUAL']);

        $request->session()->flash('success', 'Pembayaran telah dilunasi manual');

        return redirect('/person' . "/" . $pembayaran->person_uuid . "/detail");
    }
}
