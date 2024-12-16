<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekapPenjualanController extends Controller
{
    public function index(Request $request)
    {
        return view('Rekap.Penjualan');
    }
}
