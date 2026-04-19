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