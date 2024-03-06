<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;


class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    
    protected $fillable = [
        'judul',
        'deskripsi',
        'penulis',
        'sampul',
        'kategori_id',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
}