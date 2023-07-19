<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceBarang extends Model
{
    use HasFactory;

    protected $table = "invoice_barangs";

    public function barang() {
        return $this->belongsTo(Barang::class, 'invoice_barang_id');
    }
    
    public function invoice() {
        return $this->belongsToMany(Invoice::class)->withPivot('jumlah_barang','sub_total');
    }
}
