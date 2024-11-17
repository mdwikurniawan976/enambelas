<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $mapel =  Mapel::latest()->paginate(5);
        return view('mapel.index',compact('mapel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('mapel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' => 'required|min:3'
        ]);

        Mapel::create([
            'nama' => $request->nama
        ]);

        return redirect()->route('mapel.index')->with('success','data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mapel $mapel)
    {
        //
        return view('mapel.edit',compact('mapel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mapel $mapel)
    {
        //
        $request->validate([
            'nama' => 'required|min:3'
        ]);

        $mapel->update([
            'nama' => $request->nama
        ]);

        return redirect()->route('mapel.index')->with('success','data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mapel $mapel)
    {
        //
        $mapel->delete();
        return redirect()->route('mapel.index')->with('success','data berhasil dihapus');
    }
}
