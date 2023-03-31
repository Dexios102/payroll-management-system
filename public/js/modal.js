
var modal = document.getElementById("addModal");
var btn = document.getElementById("addBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function () {
    modal.style.display = "block";
};

span.onclick = function () {
    modal.style.display = "none";
};

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
};

var buttonContainer = document.querySelector("#deptTable");

var cmodal = document.getElementById("check-Modal");

var cbtn = document.querySelector("#check-Btn");

var gspan = document.getElementsByClassName("close2")[0];

buttonContainer.addEventListener("click", function (event) {
  if (event.target === cbtn) {
    cmodal.style.display = "block";
    console.log("Clicked");
  }
});

gspan.onclick = function () {
  cmodal.style.display = "none";
  console.log("Clicked");
};

window.onclick = function (event) {
  if (event.target === cmodal) {
    cmodal.style.display = "none";
    console.log("Clicked");
  }
};








