
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


function checkInfo(id){
    
    // document.getElementById("checkModal").style.display="block";
    // var fname = document.getElementById('full_name').value;
    // document.getElementById('try').innerHTML = fname;

    //  var gspan = document.getElementsByClassName("close2")[0];
    //  gspan.onclick = function () {
    //     document.getElementById("checkModal").style.display="none";
    //     };

    $.ajax({
        url:"check/deduc/"+id,
        type:"GET",
        cache:false,
        success:function(employee){
            if(employee!=""){
                document.getElementById("fullnameemployee").innerHTML = employee.f_name + " " + employee.l_name;
                $('input[name="input_employee_id"]').val(employee.emp_id);
                // document.getElementById("deduct_list").innerHTML = employee.deduc2.id;

            }

            document.getElementById("checkModal").style.display="block";

            var gspan = document.getElementsByClassName("close2")[0];
            gspan.onclick = function () {
            document.getElementById("checkModal").style.display="none";

            };

          
        }
    })

}


// 
// var cbtn = document.getElementById("check-Btn");

// // Get the <span> element that closes the modal
// 

// // When the user clicks the button, open the modal
// cbtn.onclick = function () {
//     cmodal.style.display = "block";
// };

// // When the user clicks on <span> (x), close the modal
// gspan.onclick = function () {
//     cmodal.style.display = "none";
// };

// // When the user clicks anywhere outside of the modal, close it
// window.onclick = function (event) {
//     if (event.target == cmodal) {
//         cmodal.style.display = "none";
//     }
// };


function btninput1(){
let input= document.getElementById('input1');
if (input.disabled) {
 input.disabled = false;
}
else {
    input.disabled = true;
}
}


function btninput2(){
    let input= document.getElementById('input2');
    if (input.disabled) {
     input.disabled = false;
    }
    else {
        input.disabled = true;
    }
}


function btninput3(){
    let input= document.getElementById('input3');
if (input.disabled) {
 input.disabled = false;
}
else {
    input.disabled = true;
}
}


function btninput4(){
    let input= document.getElementById('input4');
if (input.disabled) {
 input.disabled = false;
}
else {
    input.disabled = true;
}

}





