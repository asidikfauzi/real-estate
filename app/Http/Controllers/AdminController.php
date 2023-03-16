<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Storage;
use App\Models\Pesan;
use App\Models\User;
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
}
