<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buku;

class Kategori extends Model
{
    use HasFactory;

    /*
    | memberitahukan laravel bahwa tabel yang digunakan bukan kategoris
    | melainkan kategori
    */
    protected $table = "kategori";
    
    protected $fillable = [
        'kategori',
    ];

    // menghapus field bawaan dari laravel (created_at & updated_at)
    public $timestamps = false;

    public function buku()
    {
        // bisa dimiliki oleh banyak
        return $this->hasMany(Buku::class, 'kategori_id', 'id');
    }
}