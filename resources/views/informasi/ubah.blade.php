<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Informasi</title>
</head>
<body>

    <h1>Ubah Informasi</h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ url('/update-informasi/'.$informasi->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <label for="kategori_id">
            Kategori
        </label>
        <br>

        <select name="kategori_id" id="kategori_id">

            @foreach($kategoris as $kategori)

                <option value="{{ $kategori->id }}"
                    {{ $informasi->kategori_id == $kategori->id ? 'selected' : '' }}>

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
               value="{{ $informasi->judul }}">

        <br><br>

        <label for="ringkasan">
            Ringkasan
        </label>
        <br>

        <textarea id="ringkasan"
                  name="ringkasan"
                  rows="4"
                  cols="50">{{ $informasi->ringkasan }}</textarea>

        <br><br>

        <label for="isi">
            Isi Informasi
        </label>
        <br>

        <textarea id="isi"
                  name="isi"
                  rows="8"
                  cols="50">{{ $informasi->isi }}</textarea>

        <br><br>

        <label for="sumber">
            Sumber
        </label>
        <br>

        <input type="text"
               id="sumber"
               name="sumber"
               value="{{ $informasi->sumber }}">

        <br><br>

        <label for="status">
            Status
        </label>
        <br>

        <select name="status" id="status">

            <option value="draft"
                {{ $informasi->status == 'draft' ? 'selected' : '' }}>
                Draft
            </option>

            <option value="published"
                {{ $informasi->status == 'published' ? 'selected' : '' }}>
                Published
            </option>

        </select>

        <br><br>

        <button type="submit">
            Update
        </button>

    </form>

    <br>

    <a href="{{ url('/daftar-informasi') }}">
        Kembali
    </a>

</body>
</html>