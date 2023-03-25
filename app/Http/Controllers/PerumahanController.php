<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perumahan;
use App\Models\Agent;

class PerumahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $display = Perumahan::where('status', true)->orderBy('created_at', 'DESC')->limit(3)->get();
        $properties = Perumahan::where('status', true)->orderBy('created_at', 'DESC')->get();
        $agents = Agent::where('deleted', 'false')->orderBy('created_at', 'ASC')->limit(3)->get();

        return view('layouts.index', compact('display', 'properties', 'agents'));
    }

    public function about()
    {
        return view('layouts.about');
    }

    public function propertySingle($id)
    {
        $properties = Perumahan::where('id', $id)->first();
        $agents = Agent::all();

        $tunai = $properties->harga;
        $limaTahun = ($properties->harga + ($properties->harga * 0.1)) / 60;
        $sepuluhTahun = ($properties->harga + ($properties->harga * 0.2)) / 120;
        $limabelasTahun = ($properties->harga + ($properties->harga * 0.3)) / 180;
        $duapuluhTahun = ($properties->harga + ($properties->harga * 0.4)) / 240;

        $totalLimaTahun = ($properties->harga + ($properties->harga * 0.1));
        $totalSepuluhTahun = ($properties->harga + ($properties->harga * 0.2));
        $totalLimabelasTahun = ($properties->harga + ($properties->harga * 0.3));
        $totalDuapuluhTahun = ($properties->harga + ($properties->harga * 0.4));

        return view('layouts.property-single', compact(
            'properties',
            'agents',
            'limaTahun',
            'sepuluhTahun',
            'limabelasTahun',
            'duapuluhTahun',
            'totalLimaTahun',
            'totalSepuluhTahun',
            'totalLimabelasTahun',
            'totalDuapuluhTahun',
            'tunai',
        ));
    }

    public function propertyGrid()
    {
        $properties = Perumahan::where('status', true)->orderBy('created_at', 'DESC')->simplePaginate(6);
        return view('layouts.property-grid', compact('properties'));
    }

    public function agentSingle($id)
    {
        $agent = Agent::where('deleted', 'false')->where('id', $id)->first();
        return view('layouts.agent-single', compact('agent'));
    }

    public function agentGrid()
    {
        $agents = Agent::where('deleted', 'false')->orderBy('created_at', 'ASC')->simplePaginate(6);
        return view('layouts.agents-grid', compact('agents'));
    }

    public function blogSingle()
    {
        return view('layouts.blog-single');
    }

    public function blogGrid()
    {
        return view('layouts.blog-grid');
    }

    public function contact()
    {
        return view('layouts.contact');
    }
}
