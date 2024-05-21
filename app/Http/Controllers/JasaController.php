<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use Illuminate\Http\Request;
use Laraindo\RupiahFormat;
class JasaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jasas = Jasa::all();
        foreach ($jasas as $jasa) {
            $jasa->formatted_price = RupiahFormat::currency($jasa->harga);
        }

        return view('jasas.index', compact('jasas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view("jasas.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //validate form
         $this->validate($request, [
            'nama_jasa'     => 'required',
            'harga'     => 'required'
        ]);


        //create post
        Jasa::create([
            'nama_jasa'=> $request->nama_jasa,
            'harga'=> $request->harga

        ]);

        //redirect to index
        return redirect()->route('jasas.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Jasa $jasa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jasa $jasa, $id)
    {
        $jasas = Jasa::find($id);
        return view('jasas.edit', compact('jasas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jasa $jasa, $id)
    {
        $jasas = Jasa::findOrFail($id);

        $jasas->update([
            'nama_jasa'=> $request->nama_jasa,
            'harga'=> $request->harga

        ]);

        //redirect to index
        return redirect()->route('jasas.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jasa $jasa , $id)
    {
        $jasas = Jasa::findOrFail($id);
        $jasas->delete();

return redirect()->route('jasas.index')->with(['danger' => 'Data Berhasil Dihapus!']);
    }
}
