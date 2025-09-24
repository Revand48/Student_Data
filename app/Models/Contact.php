<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // ✅ Daftar kolom yang boleh di-mass-assigned
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
    ];

    // jika kamu ingin mengizinkan semua kolom (tidak direkomendasikan di production):
    // protected $guarded = [];
}
