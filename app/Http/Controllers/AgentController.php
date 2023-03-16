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
        $agents = Agent::where('deleted', false)->orderBy('created_at', 'DESC')->paginate(6);
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
            'deleted' => false,
        ]);

        Alert::success('Success', 'Agent Berhasil Ditambahkan!');
        return back();
    }

    public function edit($id)
    {
        $data = Agent::where('id', $id)->first();
        return view('dashboard.admin.agent.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Agent::where('id', $id)->first();

        $validate = $request->validate([
            'email' => 'required|string|email|max:255|unique:users,email',
            'name' => 'required|string',
            'no_telp' => 'required|string|max:12',
            'keterangan' => 'required|string',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:20000',
        ]);

        $array = [
            'email' => $request->email,
            'name' => $request->name,
            'no_telp' => $request->no_telp,
            'keterangan' => $request->keterangan,
        ];

        if ($request->hasFile('image')) {
            $array['image'] = Storage::uploadImageAgent($request->file('image'));
        }

        $data->update($array);

        Alert::success('Success', 'Agent Berhasil Diupdate!');
        return back();
    }

    public function delete($id)
    {
        $data = Agent::where('id', $id)->first();
        $data->deleted = true;
        $data->save();

        return back();
    }
}
