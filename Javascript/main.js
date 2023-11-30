let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");
let popupmodal = document.getElementById("myModal")

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};

function confirmDelete(){

  popupmodal.style.display = "flex";
  
}

function closeModal(){
  popupmodal.style.display = "none";
}