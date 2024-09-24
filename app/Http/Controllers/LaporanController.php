<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Supplier;
use App\Models\Penjualan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Models\PembelianDetail;
use App\Models\PenjualanDetail;
use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Support\Carbon;
use Carbon\Carbon;

class LaporanController extends Controller
{

    public function index()
    {
        return view("laporan.index");
    }

    public function cetak_pdf_produk(Request $request)
    {

        $produks = [];
        foreach ($request->input('getFilteredProduks') as $produkJson) {
            $produks[] = json_decode($produkJson);
        }

        $pdf = Pdf::loadview('laporan.index_pdf_produk', ['produks' => $produks]);
        $pdf->setPaper("A4", 'potrait');
        // return $pdf->download('laporan-produk-pdf');
        return $pdf->stream('Laporan-produk-' . '.pdf');
    }

    public function cetak_pdf_supplier(Request $request)
    {


        $pembeliansDetail = [];
        foreach ($request->input('getFilteredSupplier') as $supplierJson) {
            $pembeliansDetail[] = json_decode($supplierJson);
        }

        $pdf = Pdf::loadview('laporan.index_pdf_supplier', ['pembeliansDetail' => $pembeliansDetail]);
        $pdf->setPaper("A4", 'potrait');
        // return $pdf->download('laporan-supplier-pdf');
        return $pdf->stream('Laporan-supplier-' . '.pdf');
    }

    public function cetak_pdf_penjualan(Request $request)
    {


        $penjualansDetail = [];
        foreach ($request->input('getFilteredPenjualans') as $penjualanJson) {
            $penjualansDetail[] = json_decode($penjualanJson);
        }

        $pdf = Pdf::loadview('laporan.index_pdf_penjualan', ['penjualansDetail' => $penjualansDetail]);
        $pdf->setPaper("A4", 'potrait');
        // return $pdf->download('laporan-supplier-pdf');
        return $pdf->stream('Laporan-penjualan-' . '.pdf');
    }

    public function getFilteredPenjualans()
    {

        $penjualansDetail = PenjualanDetail::query()
            ->with("produk", "penjualan")
            ->orderBy('id', 'asc')
            ->when(request()->tanggal_awal && request()->tanggal_akhir, function ($query) {
                $query->whereBetween(DB::raw('DATE(created_at)'), [request()->tanggal_awal, request()->tanggal_akhir]);
            })
            ->paginate(10);
        $penjualansDetail->getCollection()->transform(function ($item) {
            $item->created_at = Carbon::parse($item->created_at)->toDateTimeString();
            return $item;
        });

        return $penjualansDetail;
    }

    public function getFilteredProduks()
    {
        return Produk::latest()
            ->when(request()->nama_produk, function ($produks) {
                $produks = $produks->where('nama_produk', 'like', '%' . request()->nama_produk . '%');
            })
            ->when(request()->stok === '0', function ($produks) {
                $produks->where('stok', 0);
            })
            ->when(request()->stok && request()->stok !== '0', function ($produks) {
                $produks->where('stok', '=', request()->stok);
            })
            ->with('kategori')->paginate(10);
    }

    public function getFilteredSuppliers()
    {


        return PembelianDetail::latest()
            ->when(request()->nama, function ($query) {
                $query->whereHas('pembelian.supplier', function ($supplierQuery) {
                    $supplierQuery->where('nama', 'like', '%' . request()->nama . '%');
                });
            })
            ->when(request()->stok, function ($query) {
                $stok = request()->stok;
                $query->whereHas('produk', function ($produkQuery) use ($stok) {
                    $produkQuery->where('stok', $stok);
                });
            })
            ->with('pembelian.supplier', "produk")
            ->paginate(10);
    }




    public function produk()
    {
        $produks = $this->getFilteredProduks();
        return view("laporan.index_produk", compact("produks"));
    }

    public function supplier()
    {
        $pembeliansDetail = $this->getFilteredSuppliers();
        return view("laporan.index_supplier", compact("pembeliansDetail"));
    }

    public function penjualan()
    {
        $penjualansDetail = $this->getFilteredPenjualans();
        return view("laporan.index_penjualan", compact("penjualansDetail"));
    }
}
