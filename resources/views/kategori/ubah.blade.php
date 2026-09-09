<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Kategori</title>
</head>
<body>

    <h1>Ubah Kategori</h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ url('/update-kategori/'.$kategori->id) }}" method="POST">

        @csrf
        @method('PUT')

        <label for="nama">Nama Kategori</label>
        <br>

        <input
            type="text"
            id="nama"
            name="nama"
            value="{{ $kategori->nama }}"
        >

        <br><br>

        <button type="submit">
            Update
        </button>

    </form>

    <br>

    <a href="{{ url('/daftar-kategori') }}">
        Kembali
    </a>

</body>
</html>