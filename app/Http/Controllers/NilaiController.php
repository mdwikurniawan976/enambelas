<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiController extends Controller
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

        $nilai = Nilai::latest()->paginate(3);
        return view('nilai.index',compact('nilai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kelas = Kelas::all();
        $siswa = Siswa::all();
        $mapel = Mapel::all();

        return view('nilai.create',compact('kelas','siswa','mapel'));


        // cara 2
        // $kelas = Kelas::all();
        // $siswa =null;
        // if($request->has('kelas')){
        //     $siswa = Siswa::where('kelas_id', $request->kelas)->get();
        // }
        // $mapel = Mapel::all();

        // return view('nilai.create',compact(['kelas','siswa','mapel']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([

            'nilai' => 'required|min:0|max:100',
            'siswa_id' => 'required',
            'kelas_id' => 'required',
            'mapel_id' => 'required'
        ]);


        Nilai::create($request->all());

        return redirect()->route('nilai.index')->with('success','data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(nilai $nilai)
    {
        //
      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(nilai $nilai)
    {
        //
        $kelas = Kelas::all();
        $siswa = Siswa::all();
        $mapel = Mapel::all();

        return view('nilai.edit',compact('kelas','siswa','mapel','nilai'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, nilai $nilai)
    {
        //
        $request->validate([

            'nilai' => 'required|min:0|max:100',
            'siswa_id' => 'required',
            'kelas_id' => 'required',
            'mapel_id' => 'required'
        ]);

        $nilai->update($request->all());

        return redirect()->route('nilai.index')->with('success','data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(nilai $nilai)
    {
        //
        $nilai->delete();
        return redirect()->route('nilai.index')->with('success','data berhasil dihapus');
    }
}
