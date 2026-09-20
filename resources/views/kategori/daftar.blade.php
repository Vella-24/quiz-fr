<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori - Admin KMS</title>
</head>
<body>

    <div style="background-color: #eef2f5; padding: 10px; margin-bottom: 20px; border-radius: 6px; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <strong>Pengguna:</strong> {{ Auth::user()->name }}
            <span style="background: #dc3545; color: white; padding: 2px 8px; border-radius: 12px; font-size: 12px; margin-left: 8px;">
                Role: {{ strtoupper(Auth::user()->role) }}
            </span>
        </div>

        <a href="{{ url('/daftar-informasi') }}" style="text-decoration: none;">
            ← Kembali ke Daftar Informasi
        </a>
    </div>

    <h1>Daftar Kategori (Admin Only)</h1>

    @if(session('success'))
        <div style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
            ✓ {{ session('success') }}
        </div>
    @endif

    <a href="{{ url('/tambah-kategori') }}" style="font-weight: bold; text-decoration: none;">+ Tambah Kategori</a>

    <br><br>

    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead style="background-color: #f8f9fa;">
            <tr>
                <th>ID</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($kategoris as $kategori)
                <tr>
                    <td>{{ $kategori->id }}</td>
                    <td>{{ $kategori->nama }}</td>
                    <td>
                        <a href="{{ route('kategori.ubah', $kategori->id) }}">
                            Edit
                        </a>

                        |

                        <form action="{{ route('kategori.hapus', $kategori->id) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" style="text-align: center;">Belum ada kategori.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>