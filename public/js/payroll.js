const { get } = require("jquery");

function inputupdate1(id){
    $.ajax({
        url:"/monthlyrate-modal/"+id,
        type:"GET",
        cache:false,
        success:function(array){
            if(array!=""){
                $('input[name="id2"]').val(array.id);
                $('input[name="mrate2"]').val(array.mrate);
                document.getElementById('mrate_label').innerHTML = "Update "+array.lname+"'s Monthly Rate";
            }
            document.getElementById("monthlyratemodal").style.display="block";   
        }
    })
  
}

function cancelbutton(){
    document.getElementById("monthlyratemodal").style.display="none";
    
}


//CHECKDEDUCTION
function checkDeduc(id){
    alert(id);
    document.getElementById('checkModal').style.display = 'block';
    $.ajax({
        url:"/checkdeductionModal/"+id,
        type:"GET",
        cache:false,
        success:function(array){
            if(array!=""){
                $('input[name="id2"]').val(array.id);
                $('input[name="mrate2"]').val(array.mrate);
                document.getElementById('mrate_label').innerHTML = "Update "+array.lname+"'s Monthly Rate";
            }
            document.getElementById('checkModal').style.display = 'block';
        }
    })
}





function closeModal(){
    document.getElementById('checkModal').style.display = 'none';
}




//ADDDEDUCTION
function addDeduc(){
    document.getElementById('addDeductionModal').style.display = 'block';
}
function closeModal2(){
    document.getElementById('addDeductionModal').style.display = 'none';
}

function addAllowance(){
    document.getElementById('additionalModal').style.display = 'block';

}
function closeModal3(){
    document.getElementById('additionalModal').style.display = 'none';
}



function deleteDeduc(id){
let text = "Are you sure to delete it?";
  if (confirm(text) == true) {
    
    $.ajax({
        url:"/payrolldeduction-delete/"+id,
        type:"GET",
        cache:false,
        success:function(response){
            alert(response);
            // setTimeout(function(){
            //     
            //    }, 1000)
            location.reload();
           
        },
        error:function(){

        }
    })
  } else {
  } 
}

function deleteDeduc2(id){
    let text = "Are you sure to delete it?";
      if (confirm(text) == true) {
        
        $.ajax({
            url:"/payrolldeduction2-delete/"+id,
            type:"GET",
            cache:false,
            success:function(response){
                alert(response);
                // setTimeout(function(){
                //     
                //    }, 1000)
                location.reload();
               
            },
            error:function(){
    
            }
        })
      } else {
      } 
    }


  function openCont(evt, contName) {
    var i, x, tablinks;
    x = document.getElementsByClassName("city");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }


    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" tab-active", "");
    }

    document.getElementById(contName).style.display = "block";
    evt.currentTarget.className += " tab-active";
  }
  
