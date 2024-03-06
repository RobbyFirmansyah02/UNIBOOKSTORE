<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class BukuController extends Controller
{
    public $buku;
    public function __construct()
    {
        $this->buku = new Buku();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //menampilkan data dari table buku
        //menggunakan sintaks eloquent
        // $data = DB::table('buku')->paginate(5);

        $buku = Buku::all();
        $no = 1;
        //Memuat deskripsidengan batasan  100 buruf
        $buku->each(function ($deskripsi) {
            $deskripsi->limitedDescription = Str::limit($deskripsi->deskripsi, 100, '[...]');
        });
        // $limitedString = Str::limitWords($buku->deskripsi, 100, '[...]');

        return view('buku.index', compact('buku', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //redirect ke form tambah
        // mengambil seluruh data dari tabel kategori
        $kategori = Kategori::all();
        return view('buku.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'sampul' => 'required|mimes:jpg,png|max:200'
        ];
        // bikin pesan error
        $messages = [
            'required' => ":attribute gak Boleh Kosong Maszeeh",
            'max' => ":attribute Ukuran/jumlah tidak sesuai mas",
            'mimes' => "ekstensi file tidak diterima, pake jpg ato png"

        ];
        // eksekusii
        $this->validate($request, $rules, $messages);

        $gambar = $request->sampul;
        // rename nama gambar
        // getClientOriginalExtension = untuk mendapatkan ekstensi file
        // echo time()
        // echo rand(100, 900)

        // $gambar->getClientOriginalExtension();
        $namaFile = time() . rand(100, 900) . "." . $gambar->getClientOriginalExtension();
        // Upload foto ke folder yang di tentukan /public/img
        // echo $namaFile;
        $this->buku->sampul = $namaFile;
        $this->buku->judul = $request->judul;
        $this->buku->deskripsi = $request->deskripsi;
        $this->buku->penulis = $request->penulis;
        $this->buku->kategori_id = $request->kategori;

        // memindahkan gambar ke dalam folder publik
        $gambar->move(public_path() . '/upload', $namaFile);
        $this->buku->save();
        return redirect()->route('buku.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // routing yang beruupa parameter / melihat data
        // Nama_Model::findOrFail($parameter)
        // jika data tidak ditemukan akan beralih ke halaman not found


        $buku = Buku::findOrFail($id);
        // ngecek dapet data atao ndak
        // dd($kategori);
        // compact untuk membawa data
        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($buku)
    {
        //
        $data = Buku::findOrFail($buku);
        $kategori = Kategori::all();
        return view('buku.edit', compact('data', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $buku)
    {
        //
        $update = Buku::findOrFail($buku);

        $rules = [
            'sampul' => 'mimes:jpg,png|max:200',
            'judul' => 'required|min:3'
        ];
        // bikin pesan error
        $messages = [
            'required' => ":attribute gak Boleh Kosong Maszeeh",
            'max' => ":attribute Ukuran/jumlah tidak sesuai mas",
            'min' => ":attribute Ukuran/jumlah tidak sesuai mas",
            'mimes' => "ekstensi file tidak diterima, pake jpg ato png"

        ];
        // eksekusii
        $this->validate($request, $rules, $messages);

        // $update->sampul;
        // kalau gambarnya kosong
        if (!$request->sampul) {
            $update->judul = $request->judul;
            $update->deskripsi = $request->deskripsi;
            $update->penulis = $request->penulis;
            $update->kategori_id = $request->kategori;
            $update->save();
            return redirect()->route('buku.index');
            // echo "gambar kosong " .$update->sampul;
        }
        // kalau ada yang nama sama dengan gambar berbeda
        if ($request->sampul) {
            $gambar = $request->sampul;
            $namaFile = time() . rand(100, 900) . "." . $gambar->getClientOriginalExtension();
            $gambar->move(public_path() . '/upload', $namaFile);
            // $update->sampul = $namaFile;
            $update->judul = $request->judul;
            $update->deskripsi = $request->deskripsi;
            $update->penulis = $request->penulis;
            $update->sampul = $namaFile;
            $update->kategori_id = $request->kategori;
            $update->save();
            return redirect()->route('buku.index');
        }

        // $gambar = $request->sampul;
        // $namaFile = time() . rand(100, 900) . "." . $gambar->getClientOriginalExtension();
        // $gambar->move(public_path() . '/upload', $namaFile);
        // // $update->sampul = $namaFile;
        // $update->judul = $request->judul;
        // $update->deskripsi = $request->deskripsi;
        // $update->penulis = $request->penulis;
        // $update->sampul = $namaFile;
        // $update->kategori_id = $request->kategori;
        // $update->save();
        // return redirect()->route('buku.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($buku)
    {

        //
        $hapus = Buku::findOrFail($buku);
        $path = 'upload/' . $hapus->sampul;
        if (File::exists($path)) {
            File::delete($path);
        }
        $hapus->delete();
        return redirect()->route('buku.index');

  }
}