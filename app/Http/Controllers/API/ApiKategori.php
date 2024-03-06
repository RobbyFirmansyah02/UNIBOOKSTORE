<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiKategori extends Controller
{
    //
    public function getData()
    {
        // $data = [
        //     [
        //         'id' => 1,
        //         'name' => "Samson"
        //     ],
        //     [
        //         'id' => 2,
        //         'name' => "Samsun"
        //     ],
        //     [
        //         'id' => 3,
        //         'name' => "Samsen"
        //     ]
        // ];

        $data = Kategori::all();
        //ini yang membedakan dengan route web
        //kalau API salah satunya bisa dibikin JSON datanya
        return response()->json([
            'status' => 'Successfully get all data',
            'kategori' => $data
        ], 200);
    }

    public function show($id)
    {
        $data = Kategori::find($id);

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
        $data = Kategori::find($id);
        if (!$data) {
            return response()->json([
                'status' => 404,
                'message' => "Data not found!",
            ], 404);
        } else {
            $data->delete();
            return response()->json([
                'status' => 'Successfully delete data',
                'kategori' => $data
            ], 200);
        }
    }

    public function store(Request $request)
    {
        //ada validasi
        $validate = Validator::make($request->all(), [
            'nama_kategori' => 'required|min:3|max:20|unique:kategori,kategori'
        ]);

        //cek kalau validasi nya bermasalah
        if ($validate->fails()) {
            return response()->json([$validate->errors(), 422]);
        }

        //simpen data
        $kategori = Kategori::create([
            'kategori' => $request->nama_kategori,
        ]);

        //return (created)
        return response()->json([
            'status' => 'Successfully create data',
            'kategori' => $kategori
        ], 201);
    }

    public function update(Request $request,  $id)
    {
        //ada validasi
        $validate = Validator::make($request->all(), [
            'nama_kategori' => 'required|min:3|max:20|unique:kategori,kategori'
        ]);

        //cek kalau validasi nya bermasalah
        if ($validate->fails()) {
            return response()->json([$validate->errors(), 422]);
        }

        $kategori = Kategori::findOrFail($id);
        //simpen data
        $kategori->update([
            'kategori' => $request->nama_kategori
        ]);

        //return (created)
        return response()->json([
            'status' => 'Successfully update data',
            'kategori' => $kategori
        ], 200);
    }
}