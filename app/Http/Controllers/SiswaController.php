<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Support\Facades\Storage;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
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
        $siswa = Siswa::latest()->paginate(5);
        return view('siswa.index',compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kelas = Kelas::all();
        return view('siswa.create',compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'foto' => 'required',
            'nama' => 'required|min:3',
            'tanggal' => 'required',
            'kelas_id' => 'required'
        ]);

        $foto = $request->file('foto');
        $foto->storeAs('public/foto', $foto->hashName());

        Siswa::create([
            'foto' => $foto->hashName(),
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'kelas_id' => $request->kelas_id
        ]);

        return redirect()->route('siswa.index')->with('success','data berhasil disimpan');

    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
        return view('siswa.show',compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        //
        $kelas = Kelas::all();
        return view('siswa.edit',compact('siswa','kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        //
        $request->validate([
            'nama' => 'required|min:3',
            'tanggal' => 'required',
            'kelas_id' => 'required'
        ]);

        

        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $foto->storeAs('public/foto', $foto->hashName());
            Storage::delete('public/foto/'. $siswa->foto);


            $siswa->update([
                'foto' => $foto->hashName(),
                'nama' => $request->nama,
                'tanggal' => $request->tanggal,
                'kelas_id' => $request->kelas_id
            ]);
        }else{
            $siswa->update([
                'nama' => $request->nama,
                'tanggal' => $request->tanggal,
                'kelas_id' => $request->kelas_id
            ]);
        }
        

        return redirect()->route('siswa.index')->with('success','data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        //
        Storage::delete('public/foto/'. $siswa->foto);
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success','data berhasil dihapus');
    }
}
