<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = "invoices";

    public function pasien() {
        return $this->belongsTo(Pasien::class);
    }
    public function invoice_barang() {
        return $this->belongsToMany(InvoiceBarang::class, 'invoice_barangs')->withPivot('jumlah_barang','sub_total');
    }
}
