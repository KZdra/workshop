<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Sparepart;
use App\Models\User;
use App\Models\Customer;
use App\Models\Jasa;
use Laraindo\RupiahFormat;
use Barryvdh\DomPDF\Facade\Pdf;
use Laraindo\TanggalFormat;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with(['customer', 'user', 'jasa', 'sparepart'])->get();
        foreach ($transactions as $transaksi) {
            $transaksi->formatted_price = RupiahFormat::currency($transaksi->total_harga);
        }
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        $users = User::where('role', 'kasir')->get();
        $jasas = Jasa::all();
        $spareparts = Sparepart::where('stok', '>', 0)->get(); // Filter sparepart yang stoknya lebih dari 0
        foreach ($jasas as $jasa) {
            $jasa->formatted_price = RupiahFormat::currency($jasa->harga);
        }
        foreach ($spareparts as $sparepart) {
            $sparepart->formatted_price = RupiahFormat::currency($sparepart->harga);
        }
        return view('transactions.add', compact('customers', 'jasas', 'spareparts', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'jasa_id' => 'required',
            'sparepart_id' => 'required',
        ]);
        $kasir = User::where('name', $request->nama_kasir)->first();
        if ($kasir) {
            $kasir_id = $kasir->id;
        } else {
        }
        $jasa = Jasa::find($request->jasa_id);
        $sparepart = Sparepart::find($request->sparepart_id);
        $total_harga = $jasa->harga + $sparepart->harga;

        // Kurangi stok sparepart
        if ($sparepart->stok > 0) {
            $sparepart->stok -= 1;
            $sparepart->save();
        } else {
        }

        Transaction::create([
            'customer_id' => $request->customer_id,
            'user_id' => $kasir_id,
            'jasa_id' => $request->jasa_id,
            'sparepart_id' => $request->sparepart_id,
            'total_harga' => $total_harga,
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }

    public function show($id)
    {
        $transactions = Transaction::with(['customer', 'user', 'jasa', 'sparepart'])->findOrFail($id);
        $tanggal = TanggalFormat::DateIndo($transactions->created_at);
        $terbilang = RupiahFormat::terbilang($transactions->total_harga);
        $formatPrice = RupiahFormat::currency($transactions->total_harga);
          // Ambil hanya jasa yang terkait dengan transaksi ini
    $selectedServices = $transactions->jasa()->pluck('nama_jasa', 'harga')->toArray();

    // Ambil hanya sparepart yang terkait dengan transaksi ini
    $selectedSpareparts = $transactions->sparepart()->pluck('nama_sparepart', 'harga')->toArray();

    // Format the prices after retrieving them and retain the item names
    $formattedServices = [];
    foreach ($selectedServices as $price => $serviceName) {
        $formattedServices[RupiahFormat::currency($price)] = $serviceName;
    }

    $formattedSpareparts = [];
    foreach ($selectedSpareparts as $price => $sparepartName) {
        $formattedSpareparts[RupiahFormat::currency($price)] = $sparepartName;
    }

    $itemsUsed = array_merge($formattedServices, $formattedSpareparts);

    $nama_cust=$transactions->customer->nama;
    $nama_file_invoice = 'Invoice_' . $nama_cust . '.pdf';

    $pdf = Pdf::loadView('transactions.invoice',compact('transactions', 'tanggal', 'terbilang', 'itemsUsed', 'formatPrice') );
         return $pdf->stream($nama_file_invoice);

        // return view('transactions.invoice', compact('transactions', 'tanggal', 'terbilang', 'itemsUsed', 'formatPrice'));
    }

    // public function edit(Transaction $transaction) {
    //     $customers = Customer::all();
    //     $users = User::where('role', 'kasir')->get();
    //     $jasas = Jasa::all();
    //     $spareparts = Sparepart::all();
    //     return view('transactions.edit', compact('transaction', 'customers', 'users', 'jasas', 'spareparts'));
    // }

    // public function update(Request $request, Transaction $transaction) {
    //     $request->validate([
    //         'customer_id' => 'required',
    //         'user_id' => 'required',
    //         'jasa_id' => 'required',
    //         'sparepart_id' => 'required',
    //         'total_harga' => 'required|numeric',
    //     ]);

    //     $transaction->update($request->all());
    //     return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    // }

    public function destroy(Transaction $transaction, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}
