<div align="center">
  <br />
  <h1>LAPORAN PRAKTIKUM<br>APLIKASI BERBASIS PLATFORM</h1>
  <br />
  <h3>PERTEMUAN 7</h3>
  <br />
  <img src="https://upload.wikimedia.org/wikipedia/commons/0/03/Logo_Telkom_University_potrait.png" alt="Logo" width="300"> 
  <br />
  <h3>Disusun Oleh :</h3>
  <p>
    <strong>Mohammad Nizal Maulana</strong><br>
    <strong>2311102150</strong><br>
    <strong>PS1IF-11-REG04</strong>
  </p>
  <br />
  <h3>Dosen Pengampu :</h3>
  <p>
    <strong>Cahyo Prihantoro, S.Kom., M.Eng</strong>
  </p>
  <br />
    <h4>Asisten Praktikum :</h4>
    <strong>Gilang Saputra</strong> <br>
    <strong>Rangga Pradarrell Fathi</strong>
  <br />
  <h3>LABORATORIUM HIGH PERFORMANCE
 <br>PROGRAM STUDI TEKNIK INFORMATIKA<br>FAKULTAS INFORMATIKA<br>UNIVERSITAS TELKOM PURWOKERTO<br>2026</h3>
</div>

## Dasar Teori

### PostgreSQL
PostgreSQL adalah sistem manajemen basis data relasional yang dikenal keandalan dan kemampuannya menangani data dengan skala besar. PostgreSQL menawarkan fitur-fitur canggih seperti dukungan penuh untuk transaksi ACID, ekstensibilitas, dan standar SQL yang tepat. 
PostgreSQL dikenal sebagai pilihan unggulan bagi pengembang dan perusahaan yang membutuhkan solusi penyimpanan data yang kuat. Sistem ini digunakan untuk berbagai aplikasi, mulai dari aplikasi web hingga analisis bisnis yang kompleks, menunjukkan fleksibilitasnya dalam berbagai konteks. 

## SOAL
### 1 jelaskan tentang git branch 
### - apa itu git branch
Branch dalam konteks pengembangan perangkat lunak, khususnya menggunakan Git, adalah cabang dari kondisi kode yang memungkinkan pengembang untuk bekerja pada versi yang berbeda dari aplikasi mereka secara paralel. Branch ini membantu dalam mengelola beberapa versi aplikasi tanpa mengganggu pengembangan di branch utama.

### - buatlah git branch dengan 2 akun berbeda dan hubungkan dengan project yang di buat di tugas 2 ( bisa dengan antar teman kelas)
1. tambahkan rekan sebagai collaborators
<img src="/pertemuan7/mahasiswa-app/storage/assets/1.png">

2. buat branch baru branch-akun1, buat file yang ingin ditambahkan dan push dengan command “git push origin branch-akun1”
<img src="/pertemuan7/mahasiswa-app/storage/assets/2.png">

3. buat branch baru lagi dengan nama branch-akun2, buat file yang akan ditambahkan dan push dengan command “git push origin branch-akun2
<img src="/pertemuan7/mahasiswa-app/storage/assets/4.png">

<img src="/pertemuan7/mahasiswa-app/storage/assets/5.png">

4. lihat bagian branch pada repo github apakah branch sudah aktif
<img src="/pertemuan7/mahasiswa-app/storage/assets/6.png">

5. dari branch main bisa me merge branch lainnya agar bisa ketambah di repositori utama
<img src="/pertemuan7/mahasiswa-app/storage/assets/7.png">

6. hasil di repo github
<img src="/pertemuan7/mahasiswa-app/storage/assets/8.png">

### - kalian jelaskan apa saja fungsi nya dan apa keuntungan git branch
a. Fungsi git-branch <br>
1. Isolasi Fitur: Membuat fitur baru atau memperbaiki bug di ruang tersendiri tanpa mengganggu kode yang sudah stabil. <br>
2. Eksperimentasi: Tempat untuk mencoba ide baru. Jika gagal, cabang tersebut tinggal dihapus tanpa memengaruhi proyek asli.<br>
3.	Paralelisme Kerja: Memungkinkan beberapa orang mengerjakan bagian yang berbeda di waktu yang sama tanpa saling menimpa pekerjaan satu sama lain.<br>

b. keuntungan memakai git-branch <br>
1.	Keamanan Kode Utama: Cabang utama (biasanya main atau master) selalu bersih dan siap untuk dirilis (production-ready).<br>
2.	Manajemen Tugas yang Rapi: Setiap tugas atau tiket fitur memiliki "wadah" masing-masing, sehingga sejarah perubahan lebih mudah dilacak.<br>
3.	Kolaborasi Lebih Mudah: Mempermudah proses Code Review melalui Pull Request sebelum perubahan digabungkan ke cabang utama.<br>
4.	Konflik Terkendali: Jika ada bentrokan kode, kamu bisa menyelesaikannya di cabang tersebut sebelum melakukan penggabungan (merge).<br>

### - buat juga output dan input apa saja yang dapat kalian lakukan mengunakan git branch
1. yang ditambahkan oleh branch-akun1 memakai command `git log  --oneline branch-akun1`
<img src="/pertemuan7/mahasiswa-app/storage/assets/9.png">

2. yang ditambahkan oleh brench-akun2 memakai command `git log  --oneline branch-akun2`
<img src="/pertemuan7/mahasiswa-app/storage/assets/10.png">

3. Pemantauan kedua branch menggunakan command `git log --oneline --graph --all`
<img src="/pertemuan7/mahasiswa-app/storage/assets/11.png">

### 2.	buatlah website ( bisa mengunakan website yang di gunnakan dalam tubes ) , lalu tambahkan database yang terhubung dengan local house 
### Code
`MahasiswaController.php`
```php
<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data = Mahasiswa::all();
        return view('mahasiswa.index', compact('data'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        Mahasiswa::create($request->all());
        return redirect('/mahasiswa');
    }

    public function edit($id)
    {
        $mhs = Mahasiswa::find($id);
        return view('mahasiswa.edit', compact('mhs'));
    }

    public function update(Request $request, $id)
    {
    $mhs = Mahasiswa::find($id);

    $mhs->update([
        'nama' => $request->nama,
        'nim' => $request->nim,
        'jurusan' => $request->jurusan
    ]);
    return redirect('/mahasiswa');
    }

    public function destroy($id)
    {
        Mahasiswa::find($id)->delete();
        return redirect('/mahasiswa');
    }
}
```
### penjelasan
Kode ini merupakan controller MahasiswaController pada Laravel yang berfungsi mengatur proses CRUD data mahasiswa. Method index, create, dan edit digunakan untuk menampilkan halaman daftar data, form tambah, serta form edit, sedangkan method store, update, dan destroy digunakan untuk menyimpan, memperbarui, dan menghapus data mahasiswa di database. Pada bagian update, data mahasiswa diperbarui secara spesifik berdasarkan input nama, nim, dan jurusan menggunakan model Eloquent ORM Mahasiswa.

`mahasiswa.php`
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = ['nama', 'nim', 'jurusan'];
}
```
### Penjelasan
Kode ini merupakan model Mahasiswa pada Laravel yang digunakan untuk menghubungkan aplikasi dengan tabel mahasiswa di database menggunakan Eloquent ORM. Class Mahasiswa mewarisi Model, sehingga dapat menjalankan operasi seperti menambah, menampilkan, mengubah, dan menghapus data. Bagian fillable berisi kolom nama, nim, dan jurusan yang diizinkan untuk diisi secara mass assignment.

`web.php`
```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return redirect('/mahasiswa');
});

Route::resource('mahasiswa', MahasiswaController::class);
```
### Penjelasan
Kode ini merupakan file routing pada Laravel yang berfungsi mengatur jalur akses aplikasi. Route / diarahkan langsung ke halaman /mahasiswa menggunakan fungsi redirect, sehingga saat aplikasi dibuka pengguna langsung masuk ke halaman data mahasiswa. Selain itu, Route::resource('mahasiswa', MahasiswaController::class) secara otomatis membuat route CRUD seperti tambah, tampil, edit, update, dan hapus data mahasiswa melalui controller.

`database postgreSQL`
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nim');
            $table->string('jurusan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
```
### Penjelasan
Kode ini merupakan file migration pada Laravel yang digunakan untuk membuat tabel mahasiswas di database. Pada method up(), tabel dibuat dengan kolom id sebagai primary key, nama, nim, jurusan, serta timestamps untuk menyimpan waktu pembuatan dan pembaruan data. Sedangkan method down() berfungsi menghapus tabel mahasiswas jika migration di-rollback.

`index.blade.php`
```php
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
```
### penjelasan
Kode ini merupakan halaman untuk menampilkan data mahasiswa pada Laravel dalam bentuk tabel yang berisi nama, NIM, dan jurusan. Data ditampilkan menggunakan perulangan @foreach($data as $d) sehingga setiap data mahasiswa yang ada di database akan muncul pada tabel. Selain itu, tersedia tombol tambah data, edit untuk mengubah data, dan hapus untuk menghapus data mahasiswa melalui form dengan metode DELETE.

`create.blade.php`
```php
<h1>Tambah Mahasiswa</h1>

<form action="/mahasiswa" method="POST">
@csrf

<input type="text" name="nama" placeholder="Nama"><br><br>
<input type="text" name="nim" placeholder="NIM"><br><br>
<input type="text" name="jurusan" placeholder="Jurusan"><br><br>

<button type="submit">Simpan</button>

</form>
```
### penjelasan
Kode ini merupakan halaman form tambah mahasiswa pada Laravel yang digunakan untuk memasukkan data baru ke dalam database. Form tersebut mengirim data ke route /mahasiswa menggunakan metode POST dan dilengkapi @csrf sebagai keamanan agar terhindar dari serangan CSRF. Di dalam form tersedia input nama, NIM, jurusan, serta tombol simpan untuk menyimpan data mahasiswa.

`edit.blade.php`
```php
<h1>Edit Mahasiswa</h1>

<form action="/mahasiswa/{{ $mhs->id }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="nama" value="{{ $mhs->nama }}"><br><br>
    <input type="text" name="nim" value="{{ $mhs->nim }}"><br><br>
    <input type="text" name="jurusan" value="{{ $mhs->jurusan }}"><br><br>

    <button type="submit">Update</button>
</form>
```
### Penjelasan
Kode ini merupakan halaman form edit mahasiswa pada Laravel yang digunakan untuk mengubah data mahasiswa yang sudah tersimpan di database. Form mengirim data ke route /mahasiswa/{id} dengan metode PUT serta dilengkapi @csrf sebagai keamanan. Input nama, NIM, dan jurusan otomatis menampilkan data lama dari variabel $mhs, sehingga pengguna dapat memperbarui data lalu menekan tombol update.

### Tampilan website dan database menggunakan postgreSQL
1. Tampilan web yang telah dibuat
<img src="/pertemuan7/mahasiswa-app/storage/assets/nomor2/1.png">

2. Tampilan database di postgreSQL
<img src="/pertemuan7/mahasiswa-app/storage/assets/nomor2/2.png">