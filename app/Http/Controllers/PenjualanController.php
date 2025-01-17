<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\PenjualanDetail;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('penjualan.index');
    }

    public function data()
    {
        $penjualan = Penjualan::where("status", 'selesai')->orderBy('id', 'desc')->get();

        return datatables()
            ->of($penjualan)
            ->addIndexColumn()
            ->addColumn('total_item', function ($penjualan) {
                return format_uang($penjualan->total_item);
            })
            ->addColumn('total_harga', function ($penjualan) {
                return 'Rp. ' . format_uang($penjualan->total_harga);
            })
            ->addColumn('bayar', function ($penjualan) {
                return 'Rp. ' . format_uang($penjualan->bayar);
            })
            ->addColumn('kode_transaksi', function ($penjualan) {
                return $penjualan->trx_penjualan;
            })
            ->addColumn('tanggal', function ($penjualan) {
                return tanggal_indonesia($penjualan->created_at, false);
            })
            ->editColumn('diskon', function ($penjualan) {
                return $penjualan->diskon . '%';
            })
            ->editColumn('kasir', function ($penjualan) {
                return $penjualan->user->name ?? '';
            })
            ->addColumn('aksi', function ($penjualan) {

                $button = '<div class="text-end">
                    <button onclick="showDetail(`' . route('penjualan.show', $penjualan->id) . '`)" class="btn btn-xs btn-bg-light"><i class="fa fa-eye"></i></button>';

                if (auth()->user()->role == 1) {
                    $button .= '<button onclick="deleteData(`' . route('penjualan.destroy', $penjualan->id) . '`)" class="btn btn-xs btn-bg-light btn-delete"><i class="fa fa-trash"></i></button>';
                }

                $button .= '</div>';

                return $button;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penjualan = new Penjualan();
        $penjualan->trx_penjualan = date('dmy') . Penjualan::count() + 1;
        $penjualan->total_item = 0;
        $penjualan->total_harga = 0;
        $penjualan->diskon = 0;
        $penjualan->bayar = 0;
        $penjualan->diterima = 0;
        $penjualan->user_id = auth()->id();
        $penjualan->save();

        session(['id' => $penjualan->id]);
        return redirect()->route('transaksi.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $penjualan = Penjualan::findOrFail($request->penjualan_id);
        $penjualan->total_item = $request->total_item;
        $penjualan->total_harga = $request->total;
        $penjualan->diskon = $request->diskon;
        $penjualan->bayar = $request->bayar;
        $penjualan->diterima = $request->diterima;
        $penjualan->status = "selesai";
        $penjualan->update();

        $detail = PenjualanDetail::where('penjualan_id', $penjualan->id)->get();
        foreach ($detail as $item) {
            $item->diskon = $request->diskon;
            $item->update();

            $produk = Produk::find($item->produk_id);
            $produk->stok -= $item->jumlah;
            $produk->update();
        }


        // return response()->json('Data berhasil disimpan', 200);
        // return $request;
        return redirect()->route('transaksi.selesai');
        // $coba = $request->all();
        // dd($coba);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $detail = PenjualanDetail::with('produk')->where('penjualan_id', $id)->get();

        return datatables()
            ->of($detail)
            ->addIndexColumn()
            ->addColumn('kode_produk', function ($detail) {
                return '<div class="badge badge-light-success">' . $detail->produk->kode_produk  . '</div>';
            })
            ->addColumn('nama_produk', function ($detail) {
                return $detail->produk->nama_produk;
            })
            ->addColumn('harga_jual', function ($detail) {
                return 'Rp. ' . format_uang($detail->harga_jual);
            })
            ->addColumn('jumlah', function ($detail) {
                return format_uang($detail->jumlah);
            })
            ->addColumn('subtotal', function ($detail) {
                return 'Rp. ' . format_uang($detail->subtotal);
            })
            ->rawColumns(['kode_produk'])
            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $penjualan = Penjualan::find($id);
        $detail    = PenjualanDetail::where('penjualan_id', $penjualan->id)->get();
        foreach ($detail as $item) {
            $produk = Produk::find($item->produk_id);
            if ($produk) {
                $produk->stok += $item->jumlah;
                $produk->update();
            }

            $item->delete();
        }
        $penjualan->delete();

        return response(null, 204);
    }
    public function selesai()
    {

        return view('penjualan.selesai');
    }
    public function nota()
    {
        $penjualan = Penjualan::find(session('id'));
        if (!$penjualan) {
            abort(404);
        }
        $detail = PenjualanDetail::with('produk')
            ->where('penjualan_id', session('id'))
            ->get();

        return view('penjualan.nota', compact('penjualan', 'detail'));
    }
}
