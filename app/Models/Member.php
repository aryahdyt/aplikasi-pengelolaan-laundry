<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = "members";

    protected $fillable = [
        "nama",
        "alamat",
        "jenis_kelamin",
        "telepon",
    ];

    public function transaksi()
    {
        return $this->hasMany(Paket::class);
    }
}
