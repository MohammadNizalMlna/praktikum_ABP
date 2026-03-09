let alignState = 0;

let posisi = 0;

function ubahAlign() {
  const container = document.querySelector(".container");

  if (posisi === 0) {
    container.style.textAlign = "center";
    posisi = 1;
  } 
  else if (posisi === 1) {
    container.style.textAlign = "right";
    posisi = 2;
  } 
  else {
    container.style.textAlign = "left";
    posisi = 0;
  }
}

let warnaBerubah = false;

function ubahBackground() {
  const boxes = document.querySelectorAll(".menu-box");

  boxes.forEach(function(box) {
    if (!warnaBerubah) {
      box.style.background = "grey";
    } else {
      box.style.background = "";
    }
  });

  warnaBerubah = !warnaBerubah;
}