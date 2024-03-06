@extends('template')
@section('konten')
		{{-- <h1>Data Mahasantri</h1>
    <form action="{{ route('search') }}" method="GET">
        <input name="cari" type="text">
        <button type="submit">Cari</button>
    </form>
    <ul>
        @foreach ($mahasantri as $data)
    <li>
        {{ $data['id']." ".$data['nama'] }}
    </li>
    @endforeach
    </ul> --}}
		<h2>Data Mahasantri</h2>
		<form action="{{ route('santri') }}" method="GET">
				<input name="cari" required type="text">
				<button type="submit">Cari</button>
		</form>
		<ul>
				@foreach ($mahasantri as $data)
						@if ($data['nama'] == $cari)
								<li>
                                    {{ $data['id'] . ' ' . $data['nama'] }}
								</li>
						@elseif($cari == '')
								<li>
                                    {{ $data['id'] . ' ' . $data['nama'] }}
								</li>
						@else
						@endif
				@endforeach
		</ul>
		<a href="{{ route('index') }}">Kembali</a>
@endsection
