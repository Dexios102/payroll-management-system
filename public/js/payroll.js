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