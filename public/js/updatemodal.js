function dedUpdate(id){

    $.ajax({
        url:"/deduction-modal/"+id,
        type:"GET",
        cache:false,
        success:function(array){
            if(array!=""){
                $('input[name="id2"]').val(array.id);
                $('input[name="code2"]').val(array.code);
                $('input[name="name2"]').val(array.name);
                $('input[name="minimum2"]').val(array.minimum);
                $('textarea[name="description2"]').val(array.description);
            }

            document.getElementById("updateModal").style.display="block";
            
            var close = document.getElementsByClassName("updateclose")[0];
            close.onclick = function () {
                document.getElementById("updateModal").style.display="none";
            };

          
        }
    })
}

function allowanceUpdate(id){

    $.ajax({
        url:"/allowance-modal/"+id,
        type:"GET",
        cache:false,
        success:function(array){
            if(array!=""){
                $('input[name="id2"]').val(array.id);
                $('input[name="code2"]').val(array.code);
                $('input[name="name2"]').val(array.name);
                // $('input[name="minimum2"]').val(array.minimum);
                $('textarea[name="description2"]').val(array.description);
            }

            document.getElementById("updateModal").style.display="block";
            
            var close = document.getElementsByClassName("updateclose")[0];
            close.onclick = function () {
                document.getElementById("updateModal").style.display="none";
            };

          
        }
    })
}


function positionUpdate(id){

    $.ajax({
        url:"/position-modal/"+id,
        type:"GET",
        cache:false,
        success:function(array){
            if(array!=""){
                $('input[name="id2"]').val(array.id);
                $('input[name="name2"]').val(array.name);
                $('textarea[name="description2"]').val(array.description);
                // document.querySelector('#division2').value = array.division;
            }

            document.getElementById("updateModal").style.display="block";
           
            
            var close = document.getElementsByClassName("updateclose")[0];
            close.onclick = function () {
                document.getElementById("updateModal").style.display="none";
            };

          
        }
    })
}