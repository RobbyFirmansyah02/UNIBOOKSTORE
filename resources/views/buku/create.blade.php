@extends('template1')
@section('nav')
		<nav class="mt-3" aria-label="breadcrumb">
				<ol class="breadcrumb">
						<li class="breadcrumb-item">
								<a href="{{ url('/') }}">
										<i class="fa fa-home"></i> Home
								</a>
						</li>
						<li class="breadcrumb-item" aria-current="page">
								<a href="{{ route('buku.index') }}">Buku</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
				</ol>
		</nav>
@endsection
@section('title')
		<div class="page-heading">
				<div class="page-title">
						<div class="row">
								<div class="col-12 order-md-1 order-last">
										<div style="float: right">
												<a href="{{ route('buku.index') }}">
														<button class="btn btn-warning mt-2">
																<i class="fa fa-arrow-circle-left"></i> Kembali
														</button>
												</a>
										</div>
										<h3>Tambah Data</h3>
								</div>
						</div>
				</div>
				<div class="page-content mt-4">
                    <section class="section">
                        <div class="row" id="basic-table">
                            <div class="col-12 col-md-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <p class="text-danger">(*) Wajib Diisi</p>
                                            <form action="{{ route('buku.store') }}" enctype="multipart/form-data" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Judul Buku <small class="text-danger">*</small></label>
                                                            <input type="text" class="form-control" name="judul" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Kategori <small class="text-danger">*</small></label>
                                                            <select class="form-select " name="kategori" aria-label="Default select example">
                                                                <option selected hidden></option>
                                                                @foreach ($kategori as $item)
                                                                    <option value="{{ $item['id'] }}">{{ $item['kategori'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Penulis <small class="text-danger">*</small></label>
                                                            <input type="text" name="penulis" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="formFile " class="form-label">Sampul Buku <small class="text-danger">*</small></label>
                                                            <input class="form-control @error('sampul') is-invalid @enderror" name="sampul" type="file" id="formFile">
                                                            @error('sampul')
                                                                <p class="text-danger ">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Deskripsi <small class="text-danger">*</small></label>
                                                    <textarea class="form-control" name="deskripsi" rows="10" cols="" aria-label="With textarea"></textarea>
                                                </div>
                                                <button class="btn btn-primary mt-3" type="submit">
                                                    <i class="fa fa-save"></i> Simpan
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
				</div>
		</div>
@endsection
