<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helper\Storage;
use App\Models\Pesan;
use App\Models\Booking;
use App\Models\Agent;
use Alert;
use DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Pesan::select(
                    'pesans.user_from',
                    'pesans.user_to',
                    'pesans.keterangan',
                    'pesans.image',
                    'users.email',
                    'pesans.created_at')
                ->join('users', function($join){
                    $join->on('users.id','=','pesans.user_from');
                })
                ->where('pesans.user_to', Auth::user()->id)
                ->orWhere('pesans.user_from', Auth::user()->id)
                ->orderBy('pesans.created_at', 'ASC')
                ->get()
                ->unique('keterangan');

        return view('dashboard.user.index', compact('data'));
    }

    public function sendPesan(Request $request) {
        if(!$request->isi_pesan)
        {
            Alert::error('Error!', 'Tidak boleh mengirimkan pesan kosong');
            return back();
        }

        $validate = $request->validate([
            'isi_pesan' => 'required|string',
            'image' => 'mimes:jpeg,jpg,png,gif|max:20000',
        ]);

        $array = [
            'user_from' => Auth::user()->id,
            'user_to' => '1ef480f4-85fb-4898-a134-ed3f5c6ea711',
            'keterangan' => $request->isi_pesan,
        ];

        if ($request->hasFile('image')) {
            $array['image'] = Storage::uploadImageMessage($request->file('image'));
        }

        $pesan = Pesan::create($array);

        Alert::success('Success', 'Pesan Berhasil Dikirim!');
        return back();
    }

    public function orderConfirmation(Request $request, $id)
    {
        $validate = $request->validate([
            'cicilan' => 'required',
            'name' => 'required|string',
            'email' => 'required|email|max:255|email',
            'no_telp' => 'required|string|min:1',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:20000',
        ]);

        // dd($validate);
        DB::beginTransaction();

        $imageUpload = Storage::uploadImageMessage($request->file('image'));
        $parts = explode('/', $request->cicilan);

        $tempo = (int)$parts[0] / 12;
        $cicilan = $parts[1];
        $totalHarga = (int)$parts[0] * (int)$cicilan;
        $booking = Booking::create([
            'user_id' => Auth::user()->id,
            'perumahan_id' => $id,
            'agent_id' => $request->agent,
            'name' => $request->name,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'tempo' => $tempo,
            'cicilan' => $cicilan,
            'total_harga' => $totalHarga,
            'image' => $imageUpload,
            'status' => 'pending',
        ]);

        $agent = Agent::where('id', $request->agent)->first();


        $keterangan = "Yang Bertanda Tangan Di Bawah Ini :
            <br> Nama: ". $request->name .
            "<br> Email:". $request->email .
            "<br> No. WhatsApp :". $request->no_telp .
            "<br> Melalui Agent : <b>".$agent->name.
            "</b> <br>" .
            "<br> Menyatakan ingin membeli rumah dengan tempo <b>". $tempo." Tahun</b>
            <br>dengan cicilan <b>Rp. ".number_format($cicilan,2)."</b>/bulan,
            <br>yang jika di totalkan harganya adalah <b>Rp. ".number_format($totalHarga,2)."</b>.
            <br>Berikut saya lampirkan syarat yang di inginkan
            sebagai berikut: <br>";

        $pesan = Pesan::create([
            'user_from' => Auth::user()->id,
            'user_to' => '1ef480f4-85fb-4898-a134-ed3f5c6ea711',
            'keterangan' => $keterangan,
            'image' => $imageUpload,
        ]);

        DB::commit();

        Alert::success('Success', 'Pembelian Property Berhasil Dikirim.');
        return back();


    }

}
