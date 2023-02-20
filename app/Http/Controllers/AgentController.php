<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
use App\Helper\Uuid;
use App\Helper\Storage;
use Alert;

class AgentController extends Controller
{
    //
    public function index()
    {
        //
        $agents = Agent::orderBy('created_at', 'DESC')->paginate(6);
        return view('dashboard.admin.agent.index', compact('agents'));
    }

    public function create()
    {
        return view('dashboard.admin.agent.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|string|email|max:255|unique:users,email',
            'name' => 'required|string',
            'no_telp' => 'required|string|max:12',
            'keterangan' => 'required|string',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:20000',
        ]);

        $agent = Agent::create([
            'id' => Uuid::getId(),
            'email' => $request->email,
            'name' => $request->name,
            'no_telp' => $request->no_telp,
            'keterangan' => $request->keterangan,
            'image' => Storage::uploadImageAgent($request->file('image')),
        ]);

        Alert::success('Success', 'Agent Berhasil Ditambahkan!');
        return back();
    }

    public function edit($id)
    {
        $data = Agent::where('id', $id)->first();
        return view('dashboard.admin.agent.edit', compact('data'));
    }
}
