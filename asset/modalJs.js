const modal = document.getElementById("myModal");
const img = document.getElementById("myImg");
const modalImg = document.getElementById("img01");
const captionText = document.getElementById("caption");
img.onclick = function () {
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
};

const span = document.getElementsByClassName("close")[0];

span.onclick = function () {
  modal.style.display = "none";
};

const croix = document.getElementById("croix");
const imgCroix = document.getElementById("myImg");

imgCroix.addEventListener("mouseover", () => {
  croix.style.visibility = "visible";
});
imgCroix.addEventListener("mouseout", () => {
  croix.style.visibility = "hidden";
});
