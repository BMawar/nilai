<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Guru;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get posts
        $mapel = Mapel::latest()->paginate(5);
        $guru = Guru::all();

        //render view with posts
        return view('mapel.index', compact('mapel', 'guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $guru = Guru::all();
        return view('mapel.create', compact('guru'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_guru'     => 'required',
            'nama_mapel'   => 'required',
        ]);

        //create post
        Mapel::create([
            'id_guru'     => $request->id_guru,
            'nama_mapel'   => $request->nama_mapel,
        ]);

        //redirect to index
        return redirect()->route('mapel.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $mapel = Mapel::findOrFail($id);
        $gurus = Guru::all();
        return view('mapel.edit', compact('mapel', 'gurus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mapel $mapel)
    {
        $request->validate([
            'id_guru'     => 'required',
            'nama_mapel'   => 'required',
        ]);

        //$mapel = Mapel::findOrFail($id);

        // Update Peminjaman instance
        $mapel->update([
            'id_guru'     => $request->id_guru,
            'nama_mapel'   => $request->nama_mapel,
        ]);

        // Redirect to the index page with a success message
        return redirect()->route('mapel.index')->with('success', 'Data Pengajar Berhasil Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mapel = Mapel::findOrFail($id);
        //delete post
        $mapel->delete();

        //redirect to index
        return redirect()->route('mapel.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
