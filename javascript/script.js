var navLinks = document.getElementById("navLinks");

// Menyimpan status menu navigasi saat dipilih
function showMenu() {
  navLinks.style.right = "0";
  localStorage.setItem("menuStatus", "shown"); // Menyimpan status menu "shown" ke localStorage
}

function hideMenu() {
  navLinks.style.right = "-200px";
  localStorage.setItem("menuStatus", "hidden"); // Menyimpan status menu "hidden" ke localStorage
}

// Memeriksa dan mengambil status menu saat halaman dimuat
document.addEventListener("DOMContentLoaded", function () {
  let menuStatus = localStorage.getItem("menuStatus");

  if (menuStatus === "shown") {
    showMenu();
  } else {
    hideMenu();
  }
});

let nextBtn = document.querySelector(".next");
let prevBtn = document.querySelector(".prev");

let slider = document.querySelector(".slider");
let sliderList = slider.querySelector(".slider .list");
let thumbnail = document.querySelector(".slider .thumbnail");
let thumbnailItems = thumbnail.querySelectorAll(".item");

thumbnail.appendChild(thumbnailItems[0]);

// Function for next button
nextBtn.onclick = function () {
  moveSlider("next");
};

// Function for prev button
prevBtn.onclick = function () {
  moveSlider("prev");
};

function moveSlider(direction) {
  let sliderItems = sliderList.querySelectorAll(".item");
  let thumbnailItems = document.querySelectorAll(".thumbnail .item");

  if (direction === "next") {
    sliderList.appendChild(sliderItems[0]);
    thumbnail.appendChild(thumbnailItems[0]);
    slider.classList.add("next");
  } else {
    sliderList.prepend(sliderItems[sliderItems.length - 1]);
    thumbnail.prepend(thumbnailItems[thumbnailItems.length - 1]);
    slider.classList.add("prev");
  }

  slider.addEventListener(
    "animationend",
    function () {
      if (direction === "next") {
        slider.classList.remove("next");
      } else {
        slider.classList.remove("prev");
      }
    },
    { once: true }
  );
}

const newSection = document.querySelector(".new-section");
const overlay = newSection.querySelector(".overlay");
const showModalBtn = newSection.querySelector(".show-modal");
const closeBtn = newSection.querySelector(".close-btn");

showModalBtn.addEventListener("click", () => {
  newSection.classList.add("active");
  showAlert();
});

overlay.addEventListener("click", () => newSection.classList.remove("active"));

closeBtn.addEventListener("click", () => newSection.classList.remove("active"));

function showAlert() {
  // Menampilkan alert
  alert("Ini adalah pesan alert!");

  // Menampilkan confirm
  let confirmation = confirm("Apakah Anda yakin ingin melanjutkan?");

  if (confirmation) {
    console.log("Pengguna menekan OK!");
  } else {
    console.log("Pengguna menekan Cancel!");
  }
}
