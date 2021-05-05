<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = "outlets";

    protected $fillable = [
        "nama",
        "alamat",
        "telepon",
    ];

    public function user()
    {
        return $this->hasOne(User::class)->where('level', 'owner');
    }
}
