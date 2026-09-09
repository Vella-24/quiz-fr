<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Informasi</title>
</head>
<body>

    <h1>{{ $informasi->judul }}</h1>

    <p>
        <strong>Kategori:</strong>
        {{ $informasi->kategori->nama }}
    </p>

    <p>
        <strong>Status:</strong>
        {{ $informasi->status }}
    </p>

    <p>
        <strong>Sumber:</strong>
        {{ $informasi->sumber ?? '-' }}
    </p>

    <hr>

    <h3>Ringkasan</h3>

    <p>
        {{ $informasi->ringkasan }}
    </p>

    <h3>Isi Informasi</h3>

    <p>
        {{ $informasi->isi }}
    </p>

    <br>

    <a href="{{ url('/daftar-informasi') }}">
        Kembali ke Daftar Informasi
    </a>

</body>
</html>