<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Invoice;
use App\Models\InvoiceBarang;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoice = Invoice::all();
        $pasien = Pasien::all();
        $barang = Barang::all();
        $get_increment = DB::select('SHOW TABLE STATUS like "invoices"');
        $get_increment = 'INV-' . date('ym') . str_pad($get_increment[0]->Auto_increment, 4, '0', STR_PAD_LEFT);
        return view('invoice', compact('invoice', 'barang', 'pasien', 'get_increment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invoice = new Invoice;
        $total = 0;
        $invoice->no_invoice = $request->no_invoice;
        $invoice->date_invoice = $request->date_invoice;
        $invoice->pasien_id = $request->pasien_id;
        $invoice->save();

        for ($i = 0; $i < count($request->barang_id); $i++) {
            $barang = Barang::find($request->barang_id[$i]);
            $sub_total = $barang->harga_barang * $request->jumlah_barang[$i];
            $invoice->invoice_barang()->attach($request->barang_id[$i], [
                'jumlah_barang' => $request->jumlah_barang[$i],
                'sub_total' => $sub_total
            ]);
            $total += $sub_total;
        }
        $invoice->total_invoice = $total;
        $invoice->update();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = Invoice::find($id);
        
        $invoice_barang = InvoiceBarang::where('invoice_id','=',$invoice->id)->get();
        // dd($invoice_barang);
        return view('show-invoice', compact('invoice','invoice_barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Invoice::find($id)->delete();
        
        return back();
    }
}
