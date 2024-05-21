<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Jasa;
use App\Models\Sparepart;
use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countC = Customer::all()->count();
        $countS = Sparepart::all()->count();
        $countJ = Jasa::all()->count();
        $countT = Transaction::all()->count();

        return view('home', compact('countC','countS','countJ','countT')) ;
    }
}
