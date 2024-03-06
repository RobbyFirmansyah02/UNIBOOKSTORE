<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasantriController extends Controller
{
    //
    public function index(Request $request)
    {
        $cari = $request->get('cari');
        // return "apa-apa";
        $mahasantri = [
            [
                'id' => 1,
                'nama' => 'samsul'
            ],
            [
                'id' => 2,
                'nama' => 'asep'
            ],
            [
                'id' => 3,
                'nama' => 'bopak'
            ],
        ];
        return view('mahasantri.index', compact('mahasantri','cari'));
    }

    public function tugas($id)
    {
        // return "apa-apa";
        $mahasantri = [
            [
                'id' => 1,
                'nama' => 'samsul'
            ],
            [
                'id' => 2,
                'nama' => 'asep'
            ],
            [
                'id' => 3,
                'nama' => 'bopak'
            ],
        ];
        return view('mahasantri.tugas', compact('id', 'mahasantri'));
    }
    // 

    // public function cari(Request $request)
    // {
    //     $cari = $request->get('cari');
    //     return view('mahasantri.cari', compact('cari'));
    // }
    /*
    | Jika ingin mengambil data dari input menggunakan (Request $request)
    |
    */

    //   public function getid($id)
    //   {
    //     $idd = $id;
    //     // return view('mahasantri.edit',compact('idd'));
    //     return view('mahasantri/edit', [
    //       'id' => $idd
    //     ]);
    //   }
    // }
}
