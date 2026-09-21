<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Informasi</title>
</head>
<body>

    <div style="background-color: #eef2f5; padding: 12px; margin-bottom: 20px; border-radius: 6px; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <strong>Selamat datang, {{ Auth::user()->name }}!</strong>
            <span style="background: #007bff; color: white; padding: 2px 8px; border-radius: 12px; font-size: 12px; margin-left: 8px;">
                Role: {{ strtoupper(Auth::user()->role) }}
            </span>
        </div>

        <form action="{{ url('/logout') }}" method="POST" style="margin: 0;">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

    <h1></h1>

    {{-- 1. Session Notification: Pesan Sukses (Slide 6 & 7) --}}
    @if(session('success'))
        <div style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
            ✓ {{ session('success') }}
        </div>
    @endif

    {{-- 2. Session Notification: Kategori Terakhir Dibuka (Slide 6 & 7) --}}
    @if(session('kategori_terakhir'))
        <div style="background-color: #e2e3e5; color: #383d41; border: 1px solid #d6d8db; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
            📌 <strong>Sesi Terakhir:</strong> Kategori artikel terakhir yang Anda buka adalah <b>"{{ session('kategori_terakhir') }}"</b>
        </div>
    @endif

    <div style="margin-bottom: 15px;">
        {{-- Otorisasi Gate: Tombol Tambah Informasi & Kelola Kategori hanya untuk Admin --}}
        @can('akses-admin')
            <a href="{{ url('/tambah-informasi') }}" style="font-weight: bold; text-decoration: none; margin-right: 15px;">
                + Tambah Informasi
            </a>

            <a href="{{ url('/daftar-kategori') }}" style="font-weight: bold; text-decoration: none;">
                📁 Kelola Kategori (Admin Only)
            </a>
        @else
            <span style="color: #6c757d; font-style: italic;">
                (Anda masuk sebagai User - Hak Akses: <b>Melihat Saja / Read Only</b>)
            </span>
        @endcan
    </div>

    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead style="background-color: #f8f9fa;">
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Ringkasan</th>
                <th>Sumber</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($informasis as $informasi)
                <tr>
                    <td>{{ $informasi->id }}</td>
                    <td>{{ $informasi->judul }}</td>
                    <td>{{ $informasi->kategori ? $informasi->kategori->nama : '-' }}</td>
                    <td>{{ $informasi->ringkasan }}</td>
                    <td>{{ $informasi->sumber ?? '-' }}</td>
                    <td>
                        <span style="padding: 2px 6px; border-radius: 4px; background: {{ $informasi->status === 'published' ? '#d4edda' : '#fff3cd' }};">
                            {{ $informasi->status }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ url('/detail-informasi/'.$informasi->id) }}">
                            Detail
                        </a>

                        {{-- Otorisasi Gate: Tombol Ubah dan Hapus Hanya untuk Admin --}}
                        @can('akses-admin')
                            |
                            <a href="{{ route('informasi.ubah', $informasi->id) }}">
                                Ubah
                            </a>

                            |
                            <form action="{{ route('informasi.hapus', $informasi->id) }}"
                                  method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('Yakin ingin menghapus informasi ini?')">
                                    Hapus
                                </button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center;">
                        Belum ada informasi.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>