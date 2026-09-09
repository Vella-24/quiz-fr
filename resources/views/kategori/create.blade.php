<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>
</head>
<body>

    <h1>Tambah Kategori</h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ url('/simpan-kategori') }}" method="POST">

        @csrf

        <label for="nama">Nama Kategori</label>
        <br>

        <input type="text" id="nama" name="nama">

        <br><br>

        <button type="submit">
            Simpan
        </button>

    </form>

    <br>

    <a href="{{ url('/daftar-kategori') }}">
        Kembali
    </a>

</body>
</html>