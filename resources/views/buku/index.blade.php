@extends('template1')
@section('title')
{{-- <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Kategori</h3>
                    <a href="{{ route('create') }}">
<button class="btn btn-success mt-2">
    <i class="fa fa-plus-circle"></i>Tambah Data
</button>
</a>
</div>
</div>
</div>
</div> --}}

{{-- @if(session('status'))
        <div class="alert alert-success alert-dismissible show fade">
            <i class="bi bi-check-circle me-1"></i>{{ session('status') }}
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></ button>
    </div>
    @endif --}}
    @endsection

    @section('nav')
    <nav class="mt-3" aria-label="breadcrumb">
        <ol aria-label="breadcrumb" class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="fa fa-home"></i>Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Buku</li>
        </ol>
    </nav>
    @endsection

    @section('tabel')
    <div class="row">
        <div class="col-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12 col-md-12 order-md-1 order-last">
                            <h3>Data Buku</h3>
                            <a href="{{ route('buku.create') }}">
                                <button class="btn btn-primary mt-2">
                                    <i class="fa fa-plus-circle"></i>Tambah Data
                                </button>
                            </a>
                            <div class="float-end">
                                <form class="d-flex" role="search">
                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-success">
                                        <i class="fa fa-search d-inline"></i>
                                        <p class="m-0 d-inline">Cari</p>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-lg">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Kode</th>
                                    <th>Kategori</th>
                                    <th>Nama Buku</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Penerbit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($buku as $book)
                                <tr>
                                    <td class="col-auto">
                                        <p class="mb-0">{{ $no++ }}</p>
                                    </td>
                                    <td class="col-auto">
                                        <div class="avatar avatar-md">
                                            <img src="{{ asset('upload') }}/{{ $book['sampul'] }}">
                                        </div>
                                    </td>
                                    <td class="col-auto">
                                        <p class=" mb-0">{{ $book['judul'] }}</p>
                                    </td>
                                    <td class="col-auto">
                                        <p class=" mb-0">{{ $book['penulis'] }}</p>
                                    </td>
                                    <td class="col-auto">
                                        <p class=" mb-0">{{ $book->kategori->nama_kategori }}</p>
                                    </td>
                                    <td class="col-auto">
                                        @if(Str::length($book->deskripsi) > 100)
                                        {{ substr($book->deskripsi,0 ,100) . "[.....]" }}
                                        @else
                                        {{ $book->deskripsi }}
                                        @endif
                                        {{-- <p class=" mb-0">{{ $book->limitedDescription }}</p> --}}
                                    </td>
                                    <td class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('buku.show',$book->id) }}" class="text-white">
                                            <button class="btn btn-primary">
                                                <i class="bi bi-info-circle"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('buku.edit',$book->id) }}" class="text-white">
                                            <button class="btn btn-warning">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('buku.show',$book->id) }}" class="text-white">
                                            <button class="btn btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection