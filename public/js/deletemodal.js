function deletemodals(id){
    $.ajax({
        url:"/employee-deletemodal/"+id,
        type:"GET",
        cache:false,
        success:function(array){
            if(array!=""){
                $('input[name="id2"]').val(array.id);
            }
            document.getElementById("deletemodal").style.display="block";   
        }
    })
}


function deletemodal2(id){
    $.ajax({
        url:"/deduction-deletemodal/"+id,
        type:"GET",
        cache:false,
        success:function(array){
            if(array!=""){
                $('input[name="id2"]').val(array.id);
            }
            document.getElementById("deletemodal").style.display="block";   
        }
    })
}

function deletemodal3(id){
    $.ajax({
        url:"/allowance-deletemodal/"+id,
        type:"GET",
        cache:false,
        success:function(array){
            if(array!=""){
                $('input[name="id2"]').val(array.id);
            }
            document.getElementById("deletemodal").style.display="block";   
        }
    })
}

function deletemodal4(id){
    $.ajax({
        url:"/position-deletemodal/"+id,
        type:"GET",
        cache:false,
        success:function(array){
            if(array!=""){
                $('input[name="id2"]').val(array.id);
            }
            document.getElementById("deletemodal").style.display="block";   
        }
    })
}

function deletemodal5(id){
    $.ajax({
        url:"/department-deletemodal/"+id,
        type:"GET",
        cache:false,
        success:function(array){
            if(array!=""){
                $('input[name="id2"]').val(array.id);
            }
            document.getElementById("deletemodal").style.display="block";   
        }
    })
}


function cancelbutton(){
    document.getElementById("deletemodal").style.display="none";
    
}