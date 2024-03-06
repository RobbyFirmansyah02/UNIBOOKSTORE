<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Kategori;
use Illuminate\Support\Facades\File;
use App\Models\Buku;
use Illuminate\Http\Request;

class ApiBuku extends Controller
{
    public function getData()
    {
        $data = Buku::all();
        return response()->json([
            'status' => 'Successfully get all data',
            'kategori' => $data
        ], 200);
    }

    public function show($id)
    {
        $data = Buku::find($id);

        if (!$data) {
            return response()->json([
                'status' => 404,
                'message' => 'Data not found!',
            ], 404);
        } else {
            return response()->json([
                'status' => 'Successfully show data',
                'data' => $data
            ], 200);
        }
    }

    public function destroy($id)
    {
        $data = Buku::find($id);
        if (!$data) {
            return response()->json([
                'status' => 404,
                'message' => "Data not found!",
            ], 404);
        } else {
            $data->delete();
            $path = 'upload/' . $data->sampul;
            if (File::exists($path)) {
                File::delete($path);
            }
            return response()->json([
                'status' => 'Successfully delete data',
                'kategori' => $data
            ], 200);
        }
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'sampul' => 'required|mimes:jpg,png|max:1500',
            'judul' => 'required|unique:buku,judul',
            'penulis' => 'required',
            'kategori' => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json([$validate->errors(), 422]);
        }

        $gambar = $request->sampul;
        $namaFile = time() . rand(100, 999) . '.' . $gambar->getClientOriginalExtension();

        $buku = Buku::create([
            'sampul' => $namaFile,
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'kategori_id' => $request->kategori,
            'deskripsi' => $request->deskripsi,
        ]);

        $gambar->move(public_path() . '/upload', $namaFile);

        return response()->json([
            'status' => 'Successfully create data',
            'kategori' => $buku
        ], 201);
    }

    public function update(Request $request,  $id)
    {
        if (!$request->sampul) {
            $validate = Validator::make($request->all(), [
                'sampul' => 'mimes:jpg,png|max:1500',
                'judul' => 'required|unique:buku,judul',
                'penulis' => 'required',
                'kategori' => 'required'
            ]);
        } else {
            $validate = Validator::make($request->all(), [
                'sampul' => 'required|mimes:jpg,png|max:1500',
                'judul' => 'required|unique:buku,judul',
                'penulis' => 'required',
                'kategori' => 'required'
            ]);
        }

        if ($validate->fails()) {
            return response()->json([$validate->errors(), 422]);
        }

        $buku = Buku::find($id);
        if (!$buku) {
            return response()->json([
                'status' => 'Data not found',
            ], 404);
        }

        if (!$request->sampul) {
            $buku->update([
                'judul' => $request->judul,
                'penulis' => $request->penulis,
                'kategori_id' => $request->kategori,
                'deskripsi' => $request->deskripsi,
            ]);
            return response()->json([
                'status' => 'Successfully update data',
                'kategori' => $buku
            ], 200);
        }

        $gambar = $request->sampul;
        $namaFile = time() . rand(100, 999) . '.' . $gambar->getClientOriginalExtension();
        $buku->update([
            'sampul' => $namaFile,
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'kategori_id' => $request->kategori,
            'deskripsi' => $request->deskripsi,
        ]);

        $gambar->move(public_path() . '/upload', $namaFile);

        return response()->json([
            'status' => 'Successfully update data',
            'kategori' => $buku
        ], 200);
    }
}