<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nilai = nilai::latest()->paginate(5);
        $siswa = Siswa::all();
        $mapel = Mapel::all();

        //render view with posts
        return view('nilai.index', compact('nilai','mapel', 'siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswas = Siswa::all();
        $mapel = Mapel::all();
        return view('nilai.create', compact('siswas', 'mapel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_siswa'     => 'required',
            'id_mapel'     => 'required',
            'nilai'   => 'required',
        ]);

        //create post
        Nilai::create([
            'id_siswa'     => $request->id_siswa,
            'id_mapel'     => $request->id_mapel,
            'nilai'   => $request->nilai,
        ]);

        //redirect to index
        return redirect()->route('nilai.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $nilai = Nilai::findOrFail($id);
        $siswas = Siswa::all();
        $mapel = Mapel::all();
        return view('nilai.edit', compact('nilai', 'siswas', 'mapel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_siswa'     => 'required',
            'id_mapel'   => 'required',
            'nilai'   => 'required',
        ]);

        $nilai = Nilai::findOrFail($id);

        // Update Peminjaman instance
        $nilai->update([
            'id_siswa'     => $request->id_siswa,
            'id_mapel'     => $request->id_mapel,
            'nilai'   => $request->nilai,
        ]);

        // Redirect to the index page with a success message
        return redirect()->route('nilai.index')->with('success', 'Data Pengajar Berhasil Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nilai = Nilai::findOrFail($id);
        //delete post
        $nilai->delete();

        //redirect to index
        return redirect()->route('nilai.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
