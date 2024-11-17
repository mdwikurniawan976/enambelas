<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
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
        $kelas = Kelas::latest()->paginate(3);
        return view('kelas.index',compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' => 'required',
            'jurusan' => 'required'
        ]);


        Kelas::create([
            'nama' => $request->nama,
            'jurusan' => $request->jurusan
        ]);

        return redirect()->route('kelas.index')->with('success','data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kelas = Kelas::with('siswa')->findOrFail($id);
        return view('kelas.detail', compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $kelas = Kelas::findOrFail($id);
        return view('kelas.edit',compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nama' => 'required',
            'jurusan' => 'required'
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update([
            'nama' => $request->nama,
            'jurusan' => $request->jurusan
        ]);

        return redirect()->route('kelas.index')->with('success','data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();
        return redirect()->route('kelas.index')->with('success','data berhasil dihapus');
    }
}
