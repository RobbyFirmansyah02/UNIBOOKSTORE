@extends('template1')
@section('title')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Kategori</h3>
                <a href="{{ route('create') }}">
                    <button class="btn btn-success mt-2">
                        <i class="fa fa-plus-circle"></i>Tambah Data
                    </button>
                </a>
                <div class="float-end">
                    <form class="d-flex" role="search" action="{{ route('kategori') }}" method="GET">
                        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success">
                            <i class="fa fa-search d-inline"></i><p class="m-0 d-inline">Cari</p>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- @if(session('status'))
    <div class="alert alert-success alert-dismissible show fade">
        <i class="bi bi-check-circle me-1"></i>{{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></   button>
    </div>
@endif --}}
@endsection

@section('nav')
    <nav class="mt-3" aria-label="breadcrumb">
        <ol aria-label="breadcrumb" class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="fa fa-home"></i>Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kategori</li>
        </ol>
    </nav>
@endsection

@section('tabel')
    <div class="row">
        <div class="col-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-lg table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kategori</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                // $no = 1
                                @endphp

                                @foreach ($data as $kategori)
                                <tr>
                                    <td class="col-auto">
                                        <p class="mb-0">{{ ++$no }}</p>
                                    </td>
                                    <td>{{ $kategori->nama_kategori }}</td>
                                    <td class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('kategori.show',$kategori->id) }}" class="text-white" >
                                        <button class="btn btn-primary">
                                                <i class="bi bi-info-circle"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('kategori.edit',$kategori->id) }}" class="text-white">
                                        <button class="btn btn-warning">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('kategori.destroy',$kategori->id) }}" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data')" class="text-white" >
                                        <button class="btn btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="">
                                    <td></td>
                                    <td></td>
                                    <td  class="float-end">{{ $data->withQueryString()->links() }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
