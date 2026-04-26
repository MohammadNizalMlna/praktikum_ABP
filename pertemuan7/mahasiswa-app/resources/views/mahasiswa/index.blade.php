<h1>Data Mahasiswa</h1>

<a href="/mahasiswa/create">Tambah Data</a>

<table border="1" cellpadding="10">
<tr>
    <th>Nama</th>
    <th>NIM</th>
    <th>Jurusan</th>
    <th>Aksi</th>
</tr>

@foreach($data as $d)
<tr>
    <td>{{ $d->nama }}</td>
    <td>{{ $d->nim }}</td>
    <td>{{ $d->jurusan }}</td>
    <td>
        <a href="/mahasiswa/{{ $d->id }}/edit">Edit</a>

        <form action="/mahasiswa/{{ $d->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus</button>
        </form>
    </td>
</tr>
@endforeach

</table>