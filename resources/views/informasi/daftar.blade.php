<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Informasi</title>
</head>
<body>

    <h1>Daftar Informasi</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ url('/tambah-informasi') }}">
        + Tambah Informasi
    </a>

    <br><br>

    <table border="1" cellpadding="10">
        <thead>
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

                    <td>{{ $informasi->kategori->nama }}</td>

                    <td>{{ $informasi->ringkasan }}</td>

                    <td>{{ $informasi->sumber ?? '-' }}</td>

                    <td>{{ $informasi->status }}</td>

                    <td>

                        <a href="{{ url('/detail-informasi/'.$informasi->id) }}">
                            Detail
                        </a>

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

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">
                        Belum ada informasi.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>