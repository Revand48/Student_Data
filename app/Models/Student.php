<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nisn',
        'kelas',
        'jurusan',
        'alamat',
        'tanggal_lahir',
    ];

    // supaya tanggal_lahir langsung jadi Carbon instance
    protected $casts = [
        'tanggal_lahir' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
