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
        $data = Perumahan::orderBy('created_at', 'DESC')->get();

        return DataTables::of($data)->addIndexColumn()
            ->addColumn('edit', function($row){
                if($row->status != false)
                {
                    return '<a href="'.route('admin.edit',$row->id).'">
                        <i class="bi bi-pencil-square" style="color:green; padding: 30%"></i></a>';
                }
            })
            ->addColumn('check', function($row){
                if($row->status != false)
                {
                    return '<a href="'.route('admin.property.terjual', $row->id).'">
                        <i class="bi bi-check-circle" style="color:green; padding: 30%"></i></a>';
                }

            })
            ->addColumn('delete', function($row){
                if($row->status != false)
                {
                    return '<a href="#">
                        <i class="bi bi-trash3" style="color:red; padding: 30%;"></i></a>';
                }
            })
            ->rawColumns(['edit','check','delete'])
            ->make(true);
    }

    public function create()
    {
        return view('dashboard.admin.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:20000',
            'lebar' => 'required|integer|min:1',
            'panjang' => 'required|integer|min:1',
            'kamar' => 'required|integer|min:1',
            'kamar_mandi' => 'required|integer|min:1',
            'garasi' => 'required|integer|min:1',
            'alamat' => 'required|string',
            'kode_pos' => 'required|string',
            'harga' => 'required|integer|min:1',
            'keterangan' => 'required|string',
        ]);

        $perumahan = Perumahan::create([
            'id' => Uuid::getId(),
            'image' => Storage::uploadImageProperties($request->file('image')),
            'lebar' => $request->lebar,
            'panjang' => $request->panjang,
            'kamar' => $request->kamar,
            'kamar_mandi' => $request->kamar_mandi,
            'garasi' => $request->garasi,
            'alamat' => $request->alamat,
            'kode_pos' => $request->kode_pos,
            'harga' => $request->harga,
            'keterangan' => $request->keterangan,
            'status' => true,
        ]);

        Alert::success('Success', 'Properties Berhasil Ditambahkan!');
        return back();
    }

    public function edit($id)
    {
        $data = Perumahan::where('id', $id)->first();
        return view('dashboard.admin.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Perumahan::where('id', $id)->first();

        $validate = $request->validate([
            'image' => 'mimes:jpeg,jpg,png,gif|max:20000',
            'lebar' => 'required|integer|min:1',
            'panjang' => 'required|integer|min:1',
            'kamar' => 'required|integer|min:1',
            'kamar_mandi' => 'required|integer|min:1',
            'garasi' => 'required|integer|min:1',
            'alamat' => 'required|string',
            'kode_pos' => 'required|string',
            'harga' => 'required|integer|min:1',
            'keterangan' => 'required|string',
        ]);

        $array = [
            'lebar' => $request->lebar,
            'panjang' => $request->panjang,
            'kamar' => $request->kamar,
            'kamar_mandi' => $request->kamar_mandi,
            'garasi' => $request->garasi,
            'alamat' => $request->alamat,
            'kode_pos' => $request->kode_pos,
            'harga' => $request->harga,
            'keterangan' => $request->keterangan,
            'status' => true,
        ];

        if ($request->hasFile('image')) {
            $array['image'] = Storage::uploadImageProperties($request->file('image'));
        }

        $data->update($array);

        Alert::success('Success', 'Properties Berhasil Diupdate!');
        return back();
    }

    public function propertyTerjual($id)
    {
        $data = Perumahan::where('id', $id)->first();

        if(!$data)
        {
            Alert::info('Not Found', 'Perumahan Tidak Ditemukan!');
            return back();
        }

        $data->update([
            'status' => false,
        ]);

        Alert::success('Success', 'Properties Berhasil Terjual!');
        return back();
    }
}
