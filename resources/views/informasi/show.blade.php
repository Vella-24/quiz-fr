<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Informasi - {{ $informasi->judul }}</title>
</head>
<body>

    <div style="background-color: #eef2f5; padding: 10px; margin-bottom: 20px; border-radius: 6px;">
        <strong>Pengguna:</strong> {{ Auth::user()->name }} ({{ strtoupper(Auth::user()->role) }})
    </div>

    <h1>{{ $informasi->judul }}</h1>

    <div style="background-color: #e3f2fd; border-left: 4px solid #2196f3; padding: 10px; margin-bottom: 15px;">
        ℹ️ Kategori <b>"{{ $informasi->kategori ? $informasi->kategori->nama : '-' }}"</b> telah disimpan ke dalam Session Anda.
    </div>

    <p>
        <strong>Kategori:</strong>
        {{ $informasi->kategori ? $informasi->kategori->nama : '-' }}
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
    <p>{{ $informasi->ringkasan }}</p>

    <h3>Isi Informasi</h3>
    <p>{{ $informasi->isi }}</p>

    <br>

    <a href="{{ url('/daftar-informasi') }}">
        ← Kembali ke Daftar Informasi
    </a>

</body>
</html>