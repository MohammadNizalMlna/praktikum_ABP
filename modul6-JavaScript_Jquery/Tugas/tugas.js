function getTHR(){
    let min = 5000;
    let max = 200000;
    let thr = Math.floor(Math.random() * (max - min + 1)) + min;
    let formatRupiah = thr.toLocaleString("id-ID");
    document.getElementById("jumlahThr").innerHTML = "Rp " + formatRupiah;
    var modal = new bootstrap.Modal(document.getElementById('thrModal'));
    modal.show();
}