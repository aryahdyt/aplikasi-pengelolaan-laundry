<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_transaksi extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = "detail_transaksis";

    protected $fillable = [
        "transaksi_id",
        "paket_id",
        "qty",
        "total_harga",
        "keterangan",
        "total_bayar",
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
}
