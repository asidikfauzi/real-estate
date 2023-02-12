<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perumahan;
use App\Helper\Storage;
use App\Helper\Uuid;
use Alert;
use DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.admin.index');
    }

    public function getDataProperties(Request $request)
    {
        $data = Perumahan::all();
        return DataTables::of($data)->addIndexColumn()
                ->addColumn('edit', function($row){
                    return '<a href="#">
                        <i class="bi bi-eye" style="color:green;"></i></a>';
                })
                ->addColumn('delete', function($row){
                    return '<a href="#">
                        <i class="bi bi-eye" style="color:green;"></i></a>';
                })
                ->rawColumns(['edit','delete'])
                ->make(true);;
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:20000',
            'lebar' => 'required|integer|min:1',
            'panjang' => 'required|integer|min:1',
            'alamat' => 'required|string',
            'harga' => 'required|integer|min:1',
            'keterangan' => 'required|string',
        ]);

        $perumahan = Perumahan::create([
            'id' => Uuid::getId(),
            'image' => Storage::uploadImageProperties($request->file('image')),
            'lebar' => $request->lebar,
            'panjang' => $request->panjang,
            'alamat' => $request->alamat,
            'harga' => $request->harga,
            'keterangan' => $request->keterangan,
        ]);

        Alert::success('Success', 'Properties Berhasil Ditambahkan!');
        return back();
    }
}
