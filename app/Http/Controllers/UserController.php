<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;
use Illuminate\Support\Facades\Auth;
use Alert;
use App\Helper\Storage;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            'user_from' => '1ef480f4-85fb-4898-a134-ed3f5c6ea711',
            'user_to' => Auth::user()->id,
            'keterangan' => $request->isi_pesan,
        ];

        if ($request->hasFile('image')) {
            $array['image'] = Storage::uploadImageMessage($request->file('image'));
        }

        $pesan = Pesan::create($array);

        Alert::success('Success', 'Pesan Berhasil Dikirim!');
        return back();
    }
}
