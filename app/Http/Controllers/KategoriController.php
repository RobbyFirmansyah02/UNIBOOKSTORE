<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Termwind\Components\Dd;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public $kategori;
    public function __construct()
    {
        $this->kategori = new Kategori();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /*
    | menamppilkan data dari tabel kategori
    | -------------------------------------
    | menggunakan sintaks eloquent
    | " Nama_File_dalam_Models::all() "
    | -------------------------------------
    */
        // $data = Kategori::all();

        //Menggunakan Query Builder
        // menampilkan dalam bentuk object
        // $data = DB::table('kategori')->simplePaginate(5);
        $cari = $request->get('search');

        $data = DB::table('kategori')
            ->where('nama_kategori','LIKE',"%$cari%")
            ->paginate(5);
        // bikin angkanya sesuai
        $no = 5 * ($data->currentPage() - 1) ;
        echo $data->currentPage();
        return view('kategori.index', compact('data', 'no', 'cari'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // redirect menuju form tambah
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // menyimpan data dari form tambah
        // tangkep inputan user
        // dd($request->all());

        // validasi inputan v.1
        // $validated = $request->validate([
        //     'nama_kategori' => 'required',

        // ]);

        // validasi inputan v.2
        // aturan main
        $rules = [
            'nama_kategori' => 'required|min:3|max:20|unique:kategori'
        ];
        // bikin pesan error
        $messages = [
            'required' => ":attribute gak Boleh Kosong Maszeeh",
            'min' => ":attribute minimal harus 3 huruf",
            'max' => ":attribute maximal harus 20 huruf",
            'unique' => ":attribute sudah digunakan, mohon ganti"

        ];
        // eksekusii
        $this->validate($request,$rules,$messages);


        // pasang ke field tabel tujuan
        $this->kategori->nama_kategori = $request->nama_kategori;
        // kemudian simpan kedalam database
        $this->kategori->save();
        Alert::success('Succespul!...', ' Data Berhasil Disimpan');
        // redirect()
        // return redirect()->route('kategori')->with('status','Succespul!... Data Berhasil Disimpan');
        //
        return redirect()->route('kategori');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        // routing yang beruupa parameter / melihat data
        // Nama_Model::findOrFail($parameter)
        // jika data tidak ditemukan akan beralih ke halaman not found


        $kategori = Kategori::findOrFail($id);
        // ngecek dapet data atao ndak
        // dd($kategori);
        // compact untuk membawa data
        return view('kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // redirect ke halaman edit

        $kategori = Kategori::findOrFail($id);

        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Mencari data kategori berdasarkan ID
    $kategori = Kategori::findOrFail($id);
    //====================================================
    // isDirty() buat ngecek ada perubahan atau tidak
    // $kategori->nama_kategori = $request-> nama_kategori;
    // if ($kategori->isDirty()) {
    //     echo "Ada Perubahan";
    // } else {
    //     echo "Tidak Berubah";
    // }
    //====================================================
    // // Aturan validasi
    $rules = [
        'nama_kategori' => 'required|min:3|max:20'
    ];

    // // Pesan error kustom
    $messages = [
        'required' => ":attribute tidak boleh kosong",
        'min' => ":attribute minimal harus 3 huruf",
        'max' => ":attribute maksimal harus 20 huruf",
    ];

    // // Melakukan validasi
    $this->validate($request, $rules, $messages);

    // // Memasukkan data dari request ke dalam model
    //=======================================================
    // // Menyimpan data awal sebelum perubahan
    // // $originalData = $kategori->getOriginal();
    // // Membandingkan data awal dengan data setelah disimpan
    // // $dataChanged = $kategori->getChanges();
    // Cek apakah ada perubahan
    // if ($dataChanged != null) {
    //     // Menampilkan notifikasi sukses dengan library Alert
    //     Alert::success('Berhasil!', 'Data berhasil diubah');
    // } else {
    //     // Tidak ada perubahan, tampilkan pesan lain atau lakukan tindakan yang sesuai
    //     Alert::warning('Peringatan!', 'Tidak ada perubahan data');
    // }
    //==================================================
    // //
    // // Pemeriksaan apakah data yang dimasukkan sama dengan data yang sudah ada
    if ( Kategori::where('nama_kategori', $request->nama_kategori)->doesntExist()) {
        // Menyimpan perubahan ke database
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        Alert::success('Berhasil!', 'Data berhasil diubah');
    } else {
        // Data tidak berubah, tampilkan pesan informasi
        Alert::info('Tidak Ada Perubahan', 'Data tidak diubah karena tidak ada perubahan');
    }
    if (Kategori::where('nama_kategori', $request->nama_kategori)->exists()) {
        Alert::warning('Peringatan!', 'Data Sudah digunakan');
        return redirect()->route('kategori.edit', $kategori['id']);
    }
    return redirect()->route('kategori');


    // Redirect ke halaman kategori setelah berhasil diubah
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    // Mencari data kategori berdasarkan ID
    $kategori = Kategori::findOrFail($id);

    //
    $kategori->delete();

    // Menampilkan notifikasi sukses dengan library Alert
    Alert::success('Berhasil!', 'Data berhasil dihapus');

    // Redirect ke halaman kategori setelah berhasil dihapus
    return redirect()->route('kategori');
}


    /**
     * Contoh buat function baru
     */
    public function history()
    {

   }
}