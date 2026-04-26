<h1>Edit Mahasiswa</h1>

<form action="/mahasiswa/{{ $mhs->id }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="nama" value="{{ $mhs->nama }}"><br><br>
    <input type="text" name="nim" value="{{ $mhs->nim }}"><br><br>
    <input type="text" name="jurusan" value="{{ $mhs->jurusan }}"><br><br>

    <button type="submit">Update</button>
</form>