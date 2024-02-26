<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get posts
        $siswa = Siswa::latest()->paginate(5);

        //render view with posts
        return view('siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama'     => 'required',
            'kelas'   => 'required'
        ]);

        //create post
        Siswa::create([
            'nama'     => $request->nama,
            'kelas'   => $request->kelas
        ]);

        //redirect to index
        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $siswa = Siswa::find($id);
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Find the student based on the provided ID
    $siswa = Siswa::findOrFail($id);

    // Validate the form data
    $this->validate($request, [
        'nama'     => 'required',
        'kelas'    => 'required',
    ]);

    // Update the student data based on the form input
    $siswa->update([
        'nama'     => $request->nama,
        'kelas'    => $request->kelas,
    ]);

    // Redirect to the index page with a success message
    return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Diubah!']);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        //delete post
        $siswa->delete();

        //redirect to index
        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
