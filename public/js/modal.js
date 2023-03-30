
var modal = document.getElementById("addModal");
var btn = document.getElementById("addBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function () {
    modal.style.display = "block";
};

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
};


var cmodal = document.getElementById("check-Modal");
var cbtn = document.getElementById("check-Btn");

// Get the <span> element that closes the modal
var gspan = document.getElementsByClassName("close2")[0];

// When the user clicks the button, open the modal
cbtn.onclick = function () {
    cmodal.style.display = "block";
};

// When the user clicks on <span> (x), close the modal
gspan.onclick = function () {
    cmodal.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == cmodal) {
        cmodal.style.display = "none";
    }
};







