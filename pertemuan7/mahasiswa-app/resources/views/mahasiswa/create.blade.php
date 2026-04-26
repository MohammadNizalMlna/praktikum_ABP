<h1>Tambah Mahasiswa</h1>

<form action="/mahasiswa" method="POST">
@csrf

<input type="text" name="nama" placeholder="Nama"><br><br>
<input type="text" name="nim" placeholder="NIM"><br><br>
<input type="text" name="jurusan" placeholder="Jurusan"><br><br>

<button type="submit">Simpan</button>

</form>