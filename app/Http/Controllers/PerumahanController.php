<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perumahan;

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

        return view('layouts.index', compact('display', 'properties'));
    }

    public function about()
    {
        return view('layouts.about');
    }

    public function propertySingle()
    {
        return view('layouts.property-single');
    }

    public function propertyGrid()
    {
        $properties = Perumahan::where('status', true)->orderBy('created_at', 'DESC')->paginate(6);
        return view('layouts.property-grid', compact('properties'));
    }

    public function agentSingle()
    {
        return view('layouts.agent-single');
    }

    public function agentGrid()
    {
        return view('layouts.agents-grid');
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
}
