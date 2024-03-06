<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mahasantri</title>
</head>
<body>
  <h1>Data Mahasantri</h1>
  <ul>
    @foreach ($mahasantri as $data)
    @if($id == $data['id'])
    <li>
        {{ $data['id']." ".$data['nama'] }}
    </li>
    @endif
    @endforeach
  </ul>
</body>
</html>
