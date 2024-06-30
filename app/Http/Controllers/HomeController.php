<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\ObatMasuk;
use App\Models\ObatKeluar;

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
    public function index() {
        $totalObat = Obat::count();
        $totalObatMasuk = ObatMasuk::count();
        $totalObatKeluar = ObatKeluar::count();

        return view('home', compact('totalObat', 'totalObatMasuk', 'totalObatKeluar'));
    }
    // public function index()
    // {
    //     return view('home');
    // }
}
