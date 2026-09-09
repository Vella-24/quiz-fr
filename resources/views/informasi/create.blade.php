<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Informasi</title>
</head>
<body>

    <h1>Tambah Informasi</h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ url('/simpan-informasi') }}" method="POST">

        @csrf

        <label for="kategori_id">
            Kategori
        </label>
        <br>

        <select name="kategori_id" id="kategori_id">

            <option value="">
                -- Pilih Kategori --
            </option>

            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}">
                    {{ $kategori->nama }}
                </option>
            @endforeach

        </select>

        <br><br>

        <label for="judul">
            Judul
        </label>
        <br>

        <input type="text"
               id="judul"
               name="judul"
               value="{{ old('judul') }}">

        <br><br>

        <label for="ringkasan">
            Ringkasan
        </label>
        <br>

        <textarea id="ringkasan"
                  name="ringkasan"
                  rows="4"
                  cols="50">{{ old('ringkasan') }}</textarea>

        <br><br>

        <label for="isi">
            Isi Informasi
        </label>
        <br>

        <textarea id="isi"
                  name="isi"
                  rows="8"
                  cols="50">{{ old('isi') }}</textarea>

        <br><br>

        <label for="sumber">
            Sumber
        </label>
        <br>

        <input type="text"
               id="sumber"
               name="sumber"
               value="{{ old('sumber') }}">

        <br><br>

        <label for="status">
            Status
        </label>
        <br>

        <select name="status" id="status">

            <option value="draft">
                Draft
            </option>

            <option value="published">
                Published
            </option>

        </select>

        <br><br>

        <button type="submit">
            Simpan
        </button>

    </form>

    <br>

    <a href="{{ url('/daftar-informasi') }}">
        Kembali
    </a>

</body>
</html>