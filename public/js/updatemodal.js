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

function departmentUpdate(id){


    $.ajax({
        url:"/department-modal/"+id,
        type:"GET",
        cache:false,
        success:function(array){
            if(array!=""){
                $('input[name="id2"]').val(array.id);
                $('input[name="code2"]').val(array.code);
                $('input[name="floor2"]').val(array.floor);
                $('input[name="division2"]').val(array.division);
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

function employeeUpdate(id){
    

    $.ajax({
        url:"/employee-modal/"+id,
        type:"GET",
        cache:false,
        success:function(array){
            if(array!=""){
                $('input[name="id2"]').val(array.id);
                $('input[name="f_name2"]').val(array.f_name);
                $('input[name="m_name2"]').val(array.m_name);
                $('input[name="l_name2"]').val(array.l_name);
                $('input[name="suffix2"]').val(array.suffix);
                $('input[name="contact2"]').val(array.contact);
                $('input[name="m_rate2"]').val(array.m_rate);
                $('input[name="email2"]').val(array.email);
                $('#gender2').val(array.gender);
                $("#department2").val(array.department);
                $("#position2").val(array.position);
                $('input[name="birthdate2"]').val(array.birthdate);
                $('input[name="birthplace2"]').val(array.birthplace);
                $('input[name="address2"]').val(array.address);
                $("#employee_type2").val(array.employee_type);
                $("#status2").val(array.status);
                // $('textarea[name="description2"]').val(array.description);
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

// DELETEMODALS


