<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = "transaksis";

    protected $fillable = [
        "outlet_id",
        "kode_invoice",
        "member_id",
        "tgl",
        "batas_waktu",
        "tgl_pembayaran",
        "biaya_tambahan",
        "diskon",
        "pajak",
        "status",
        "dibayar",
        "user_id",
    ];

    public function detail_transaksi()
    {
        return $this->hasOne(Detail_transaksi::class);
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
