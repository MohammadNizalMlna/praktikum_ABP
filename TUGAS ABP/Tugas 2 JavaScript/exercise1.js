// mohammad nizal maulana - 2311102150
function sumOdd(min, max) {
    let total = 0;
    let deret = [];

    for (let i = min; i <= max; i++) {
        if (i % 2 !== 0) {
            total += i;
            deret.push(i);
        }
    }

    return {
        total: total,
        deret: deret.join("+")
    };
}

function hitung() {
    let min = parseInt(document.getElementById("min").value);
    let max = parseInt(document.getElementById("max").value);

    let result = sumOdd(min, max);

    document.getElementById("hasil").innerText =
        "Hasil = " + result.total + " (" + result.deret + ")";
}