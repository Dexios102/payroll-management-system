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