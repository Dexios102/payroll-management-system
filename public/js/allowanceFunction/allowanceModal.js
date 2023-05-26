let modal = document.getElementById("addModal");
let btn = document.getElementById("addBtn");
btn.onclick = function () {
    modal.style.display = "block";
};
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
};

/* let modal_edit = document.getElementById("editModal");
let btn_edit = document.getElementById("editBtn");
btn_edit.onclick = function () {
    modal_edit.style.display = "block";
};
window.onclick = function (event) {
    if (event.target == modal_edit) {
        modal_edit.style.display = "none";
    }
}; */