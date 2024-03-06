<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>

<body>
  <h1>Dashboard</h1>
  <ul>
    {{-- Hyperlink dengan URL --}}
    <a href="{{ url('mahasantri_petik') }}">
      <li>Data Mahasantri</li>
    </a>
    {{-- Hyperlink dengan route (dengan nama url yang dialiaskan) --}}
    {{-- <a href="{{ route('santri') }}">
      <li>Data Mahasantri</li>
    </a> --}}
    <li>Data Jurusan</li>
  </ul>
</body>

</html>
