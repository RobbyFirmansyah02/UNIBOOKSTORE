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
								<a href="{{ route('kategori') }}">Kategori</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Lihat Data</li>
				</ol>
		</nav>
@endsection
@section('title')
		<div class="page-heading">
				<div class="page-title">
						<div class="row">
								<div class="col-7 order-md-1 order-last">
										<div style="float: right">
												<a href="{{ route('kategori') }}">
														<button class="btn btn-warning mt-2">
																<i class="fa fa-arrow-circle-left"></i> Kembali
														</button>
												</a>
										</div>
										<h3>Lihat Data</h3>
								</div>
						</div>
				</div>
				<div class="page-content mt-4">
                    <section class="section">
                        <div class="row" id="basic-table">
                            <div class="col-12 col-md-7">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <h4>Nama Kategori : {{ $kategori['nama_kategori'] }}</h4>
                                        </div>
                                    </div>
                                </div>
                                </div>
                        </div>
                    </section>
				</div>
		</div>
@endsection
