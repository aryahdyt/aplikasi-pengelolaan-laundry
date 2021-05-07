<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = "pakets";

    protected $fillable = [
        "outlet_id",
        "jenis",
        "nama_paket",
        "harga",
    ];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
}
