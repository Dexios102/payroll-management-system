
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

function checkInfo(id) {

    $.ajax({
        url: "check/deduc/" + id,
        type: "GET",
        cache: false,
        success: function (employee) {
            if (employee != "") {
                document.getElementById("fullnameemployee").innerHTML = employee.f_name + " " + employee.l_name;
                $('input[name="input_employee_id"]').val(employee.emp_id);
                // document.getElementById("deduct_list").innerHTML = employee.deduc2.id;


            }
            document.getElementById("checkModal").style.display = "block";

            var gspan = document.getElementsByClassName("close2")[0];
            
            gspan.onclick = function () {
                document.getElementById("checkModal").style.display = "none";
            };


        }
    });

}





function btninput1() {
    let input = document.getElementById('input1');
    if (input.disabled) {
        input.disabled = false;
    }
    else {
        input.disabled = true;
    }
}


function btninput2() {
    let input = document.getElementById('input2');
    if (input.disabled) {
        input.disabled = false;
    }
    else {
        input.disabled = true;
    }
}


function btninput3() {
    let input = document.getElementById('input3');
    if (input.disabled) {
        input.disabled = false;
    }
    else {
        input.disabled = true;
    }
}


function btninput4() {
    let input = document.getElementById('input4');
    if (input.disabled) {
        input.disabled = false;
    }
    else {
        input.disabled = true;
    }

}

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









