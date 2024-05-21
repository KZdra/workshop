<?php

namespace App\Http\Controllers;

use App\Models\Sparepart;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Laraindo\RupiahFormat;
use Illuminate\Support\Facades\Storage;

class SparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spareparts = Sparepart::all();
        foreach ($spareparts as $sparepart) {
            $sparepart->formatted_price = RupiahFormat::currency($sparepart->harga);
        }

        return view('spareparts.index', compact('spareparts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('spareparts.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama_sparepart' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'img' => 'required|image|mimes:jpeg,jpg,png',
        ]);

        //upload image
        $image = $request->file('img');
        $image->storeAs('public/images', $image->hashName());

        //create post
        Sparepart::create([
            'nama_sparepart' => $request->nama_sparepart,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'img' => $image->hashName(),
        ]);

        //redirect to index
        return redirect()
            ->route('spareparts.index')
            ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sparepart $sparepart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sparepart $sparepart, $id)
    {
        $spareparts = Sparepart::find($id);
        return view('spareparts.edit', compact('spareparts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         //validate form
         $this->validate($request, [
            'nama_sparepart' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'stok' => 'required',
         ]);

        $sparepart = Sparepart::findOrFail($id);

        $sparepart->update([
            'nama_sparepart'=> $request->nama_sparepart,
            'deskripsi'=> $request->deskripsi,
            'harga'=> $request->harga,
            'stok'=> $request->stok

        ]);

        //redirect to index
        return redirect()->route('spareparts.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sparepart $sparepart, $id)
    {
        $spare = Sparepart::findOrFail($id);

        Storage::delete('public/images/'. $spare->img);

        $spare->delete();

        return redirect()->route('spareparts.index')->with(['danger' => 'Data Berhasil Dihapus!']);

    }
}
