<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view("customers.index" ,compact("customers"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("customers.add");
    }

    /**
     * Store a newly created resource in storage.

     */
    public function store(Request $request) : RedirectResponse
    {
         //validate form
         $this->validate($request, [
            'nama'     => 'required',
            'no_telp'     => 'required',
            'jenis_kendaraan'   => 'required',
            'alamat'   => 'required',
            'no_kendaraan'   => 'required'
        ]);


        //create post
        Customer::create([
            'nama'=> $request->nama,
            'no_telp'=> $request->no_telp,
            'jenis_kendaraan'=> $request->jenis_kendaraan,
            'alamat'=> $request->alamat,
            'no_kendaraan'=> $request->no_kendaraan,
        ]);

        //redirect to index
        return redirect()->route('customers.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer , $id)
    {
        $cust = Customer::find($id);
        return view('customers.edit',compact('cust'));

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer , $id) : RedirectResponse
    {
         //validate form
         $this->validate($request, [
            'nama'     => 'required',
            'no_telp'     => 'required',
            'jenis_kendaraan'   => 'required',
            'alamat'   => 'required',
            'no_kendaraan'   => 'required'
        ]);

        $cust = Customer::findOrFail($id);

        $cust->update([
            'nama'=> $request->nama,
            'no_telp'=> $request->no_telp,
            'jenis_kendaraan'=> $request->jenis_kendaraan,
            'alamat'=> $request->alamat,
            'no_kendaraan'=> $request->no_kendaraan,
        ]);

        //redirect to index
        return redirect()->route('customers.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer , $id)
    {
        $cust = Customer::findOrFail($id);

        $cust->delete();

        return redirect()->route('customers.index')->with(['danger' => 'Data Berhasil Dihapus!']);

    }


}
