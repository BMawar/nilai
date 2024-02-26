<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get posts
        $guru = Guru::latest()->paginate(5);

        //render view with posts
        return view('guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //validate form
         $this->validate($request, [
            'nama_guru'     => 'required',
        ]);

        //create post
        Guru::create([
            'nama_guru'     => $request->nama_guru,
        ]);

        //redirect to index
        return redirect()->route('guru.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $guru = Guru::find($id);
        return view('guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $guru = Guru::findOrFail($id);
        //validate form
        $this->validate($request, [
            'nama_guru'     => 'required',
        ]);

            //update post with new image
            $guru->update([
                'nama_guru'     => $request->nama_guru,
            ]);
 {

            //update post without image
            $guru->update([
                'nama_guru'     => $request->nama_guru,
            ]);
        }

        //redirect to index
        return redirect()->route('guru.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guru = Guru::findOrFail($id);
        //delete post
        $guru->delete();

        //redirect to index
        return redirect()->route('guru.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
