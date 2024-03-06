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
						<li class="breadcrumb-item active" aria-current="page">Detail Buku : {{ $buku['judul'] }}</li>
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
										<h3>Detail Buku</h3>
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
                                            <div class="row mt-5">
                                                <div class="col-md-4">
                                                    <img src="{{ asset('upload') }}/{{ $buku['sampul'] }}" alt="" class="w-75">
                                                </div>
                                                <div class="col-md-8" style="margin-left:-5%">
                                                <div class="table-responsive">
                                                    <table class="table table-lg">
                                                        <tr>
                                                            <th style="width:17%;">Judul Buku : </th>
                                                            <td>{{ $buku['judul'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width:17%;">Penulis :</th>
                                                            <td>{{ $buku['penulis'] }}</td> 
                                                        </tr>
                                                        <tr>
                                                            <th style="width:17%;">Tanggal :</th>
                                                            <td>{{ $buku->created_at->isoFormat('dddd, D MMMM Y') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width:17%;">Deskripsi :</th>
                                                            <td>{{ $buku['deskripsi'] }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                </div>
                                            </div>
                                            <h4></h4>
                                            <h4> </h4>
                                            <h4> </h4>
                                            <h4></h4>
                                        </div>
                                    </div>
                                </div>
                                </div>
                        </div>
                    </section>
				</div>
		</div>
@endsection
