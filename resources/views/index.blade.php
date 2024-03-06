@extends('template')
{{-- section untuk mengisi bagian yang ditandai @yield dengan nama yang sama --}}
@section('konten')
    <p>Ini adalah file Index</p>
    <a href="{{ route('santri') }}">Pindah Halaman</a>
@endsection
