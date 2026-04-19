<div align="center">
  <br />
  <h1>LAPORAN PRAKTIKUM<br>APLIKASI BERBASIS PLATFORM</h1>
  <br />
  <h3>MODUL 10 - 13 (PERTEMUAN 6)<br>LARAVEL & AJAX</h3>
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

### PHP
Merupakan singkatan rekursif dari PHP : Hypertext Preprocessor. Pertama kali diciptakan oleh Rasmus Lerdorf pada tahun 1994. 

### Laravel
Laravel adalah sebuah web application framework yang bersifat open-source yang digunakan untuk 
membangun aplikasi php dinamis. Laravel menjadi sebuah framework PHP dengan model MVC 
(Model, View, Controller) yang dapat mempercepat pengembang untuk membuat sebuah aplikasi 
web. Selain ringan dan cepat, Laravel juga memiliki dokumentasi yang lengkap disertai dengan contoh 
implementasi kodenya. 

### AJAX
AJAX (Asynchronous JavaScript and XML) suatu teknik pemrograman berbasis web untuk menciptakan aplikasi web interaktif. Tujuannya adalah untuk memindahkan sebagian besar interaksi pada komputer user, melakukan pertukaran data dengan server di belakang layar, sehingga halaman web tidak harus dibaca ulang secara keseluruhan setiap kali seorang pengguna melakukan perubahan. Hal ini akan meningkatkan interaktivitas, kecepatan, dan usability.  

## Code Program
### `mahasiswa_index.blade.php`
```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Praktikum Laravel AJAX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body text-center">
            <h2 class="mb-4">Daftar Mahasiswa Informatika</h2>
            
            <button id="btnTampilkan" class="btn btn-primary mb-4">Tampilkan Data</button>

            <div id="areaHasil" class="table-responsive">
                <p class="text-muted">Klik tombol di atas untuk memuat data.</p>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#btnTampilkan').click(function() {
            // Memberi feedback visual saat loading
            $('#areaHasil').html('<div class="spinner-border text-primary" role="status"></div>');

            $.ajax({
                url: "{{ route('mahasiswa.data') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    let html = `
                        <table class="table table-bordered table-striped mt-3">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Kelas</th>
                                    <th>Prodi</th>
                                </tr>
                            </thead>
                            <tbody>
                    `;

                    // Iterasi data mahasiswa
                    $.each(data, function(key, val) {
                        html += `
                            <tr>
                                <td>${val.nama}</td>
                                <td>${val.nim}</td>
                                <td>${val.kelas}</td>
                                <td>${val.prodi}</td>
                            </tr>
                        `;
                    });

                    html += '</tbody></table>';

                    // Masukkan ke area hasil
                    $('#areaHasil').html(html);
                },
                error: function() {
                    $('#areaHasil').html('<div class="alert alert-danger">Gagal mengambil data!</div>');
                }
            });
        });
    });
</script>

</body>
</html>
```
### Penjelasan
Kode ini merupakan halaman web sederhana berbasis Laravel yang digunakan untuk menampilkan data mahasiswa menggunakan AJAX. Tampilan dibuat dengan Bootstrap agar lebih rapi, sedangkan jQuery digunakan untuk menjalankan fungsi saat tombol “Tampilkan Data” ditekan.
Saat tombol diklik, sistem mengirim request GET ke route mahasiswa.data untuk mengambil data mahasiswa dalam format JSON tanpa reload halaman. Jika berhasil, data nama, NIM, kelas, dan prodi akan ditampilkan dalam bentuk tabel. Jika gagal, akan muncul pesan error. Kode ini menunjukkan penggunaan AJAX agar proses tampil data lebih cepat dan interaktif.

### `web.php`
```php
<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MahasiswaController::class, 'index']);
Route::get('/get-mahasiswa', [MahasiswaController::class, 'getData'])->name('mahasiswa.data');

```
### Penjelasan
Kode ini merupakan file routing pada Laravel yang berfungsi mengatur alamat URL dan menghubungkannya ke controller. Route pertama '/ ' mengarahkan halaman utama ke method index pada MahasiswaController, sehingga saat website dibuka akan menampilkan halaman utama. Route kedua '/get-mahasiswa' mengarah ke method getData yang digunakan untuk mengambil data mahasiswa. Route ini diberi nama mahasiswa.data agar dapat dipanggil dengan mudah, misalnya pada proses AJAX untuk menampilkan data tanpa reload halaman.

### `MahasiswaController.php`
```php
<?php

namespace App\Http\Controllers;

class MahasiswaController extends Controller
{
    public function index()
    {
        return view('mahasiswa_index');
    }

    public function getData()
    {
        $path = storage_path('app/json/mahasiswa.json');

        if (!file_exists($path)) {
            return response()->json([
                'error' => 'File tidak ditemukan'
            ], 404);
        }

        $content = file_get_contents($path);
        $data = json_decode($content, true);

        return response()->json($data);
    }
}
```
### Penjelasan
Kode ini merupakan controller pada Laravel yang digunakan untuk mengatur tampilan halaman dan pengambilan data mahasiswa. Method index() berfungsi menampilkan view mahasiswa_index sebagai halaman utama. Sedangkan method getData() digunakan untuk membaca file mahasiswa.json yang berada di folder storage. Jika file tidak ditemukan, sistem akan mengirim pesan error dalam format JSON dengan kode 404. Jika file tersedia, isi file dibaca lalu diubah menjadi array menggunakan json_decode(), kemudian dikirim kembali sebagai response JSON agar dapat ditampilkan melalui AJAX di halaman web.

### `mahasiswa.json`
```json
[
    {
        "nama": "Mohammad Nizal Maulana",
        "nim": "2311102150",
        "kelas": "S1IF-11-04",
        "prodi": "Teknik Informatika"
    },
    {
        "nama": "Mohammad",
        "nim": "23111111111",
        "kelas": "S1IF-11-099",
        "prodi": "Teknik Kimia"
    },
    {
        "nama": "Maulana",
        "nim": "231222333",
        "kelas": "S1IF-11-88",
        "prodi": "Teknik gacor"
    }
]
```
### Penjelasan
Kode di atas merupakan file data berformat JSON yang berisi daftar mahasiswa. Data disusun dalam bentuk array yang terdiri dari beberapa objek, di mana setiap objek menyimpan informasi mahasiswa seperti nama, NIM, kelas, dan program studi. File ini digunakan sebagai sumber data yang nantinya dibaca oleh controller pada Laravel, kemudian dikirim dalam format JSON untuk ditampilkan pada halaman web menggunakan AJAX.

## Cara Kerja Aplikasi
1. Jalankan Aplikasi dengan mengetik  di cmd php artisan serve
<img src="/laravelAjax/storage/assets/serve.png">

2. buka`http://127.0.0.1:8000` pada browser, kemudian akan ditampilkan halaman awal yang berisi judul dan tombol
<img src="/laravelAjax/storage/assets/halaman.png">

3. Pencet tombol tampilkan data untuk menampilkan data json
<img src="/laravelAjax/storage/assets/loading.png">

4. Setelah proses loading data akan ditampilkan dengan bentuk tabel
<img src="/laravelAjax/storage/assets/tabelData.png">


