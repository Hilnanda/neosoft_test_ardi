<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = "barangs";

    // public function invoices(){
    // 	return $this->hasMany('App\Invoice');
    // }

    public function invoice_barangs() {
        return $this->hasMany(InvoiceBarang::class);
    }
}
