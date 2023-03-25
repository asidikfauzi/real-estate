<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Storage;
use App\Models\Pesan;
use App\Models\User;
use App\Models\Perumahan;
use DataTables;
use Auth;
use Alert;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::select(
            'pesans.user_from',
            'users.email'
        )
        ->join('pesans','users.id','=','pesans.user_from')
        ->where('users.id', '!=', Auth::user()->id)
        ->groupBy('pesans.user_from', 'users.email')
        ->get();

        return view('dashboard.admin.message.index', compact('data'));

    }

    public function show($id)
    {
        //
        $data = User::select(
            'pesans.user_from',
            'pesans.user_to',
            'pesans.keterangan',
            'pesans.image',
            'users.email',
            'pesans.created_at')
        ->join('pesans', 'users.id', '=','pesans.user_from')
        ->where('pesans.user_to', $id)
        ->orWhere('pesans.user_from', $id)
        ->orderBy('pesans.created_at', 'ASC')
        ->get();

        return json_decode($data);
    }


    public function destroy($id)
    {
        //
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
            'user_to' => $request->id_user,
            'keterangan' => $request->isi_pesan,
        ];

        if ($request->hasFile('image')) {
            $array['image'] = Storage::uploadImageMessage($request->file('image'));
        }

        $pesan = Pesan::create($array);

        Alert::success('Success', 'Pesan Berhasil Dikirim!');
        return back();
    }

    public function booking()
    {
        return view('dashboard.admin.booking.index');
    }

    public function getDataBooking()
    {
        $data = Perumahan::select('perumahans.id',
                'perumahans.image',
                'perumahans.alamat',
                'perumahans.harga',
                'perumahans.keterangan',
                'bookings.status',
                'users.email as pembeli',
                'agents.name as agent',
            )
            ->join('bookings', 'perumahans.id', 'bookings.perumahan_id')
            ->join('agents', 'bookings.agent_id', 'agents.id')
            ->join('users', 'users.id', 'bookings.user_id')
            ->orderBy('bookings.created_at', 'DESC')
            ->get();

        return DataTables::of($data)->addIndexColumn()
            ->addColumn('check', function($row){
                if($row->status != 'terjual')
                {
                    return '<a href="'.route('admin.property.terjual', $row->id).'">
                        <i class="bi bi-check-circle" style="color:green; padding: 30%"></i></a>';
                }

            })
            ->addColumn('delete', function($row){
                if($row->status != 'terjual')
                {
                    return '<a href="'.route('admin.property.ditolak', $row->id).'">
                        <i class="bi bi-x-lg" style="color:red; padding: 30%;"></i></a>';
                }
            })
            ->rawColumns(['edit','check','delete'])
            ->make(true);
    }
}
