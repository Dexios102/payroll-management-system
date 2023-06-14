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
  

function inputEmployee() {
    let input = document.getElementById("inputEmployee").value;
    // document.getElementById("try").innerHTML = "Your email: " + id;
    // console.log(input);

    $.ajax({
        url:"/payslip-check",
        type:"GET",
        data:{'input_data':input},
        cache:false,
        success:function(data){
            console.log(data.daily_rate);
            console.log(data.hour_rate);
            console.log(data.minute_rate);
            //console.log(data.monthHTML);
            $('#empFullname').html('Employee Name: <span>'+ data.emp_array.fullname + '</span>');
            $('#empId').html('Employee ID: <span>'+ data.emp_array.id + '</span>');
            $('#empDepartment').html('Department: <span>'+ data.emp_array.dept + '</span>');
            $('#empPosition').html('Designation/Position: <span>'+ data.emp_array.pos + '</span>');
            $('#empSalary').val(data.emp_array.salary);
            $('#empEarned').val(data.amountEarned);
            $('#empId2').val(data.emp_array.id2 );
            // DEDUCTION
            $('#dedlist').html(data.dedHTML);
            $('#dedamount').html(data.amountHTML);
            $('#totalDed').val(data.totalDed);
            // CONTRIBUTIONS
            $('#contrilist').html(data.contriHTML);
            $('#contriamount').html(data.contriAmount);
            //ADDITIONALS
            $('#addlist').html(data.addHTML);
            $('#addamount').html(data.addAmount);
            $('#totalAdd').val(data.totalEarned);

            //TOTAL NET
            $totalnet = $('#totalAdd').val() - $('#totalDed').val();
            $('#totalnet').html('Total Net Amount: ₱ '+$totalnet.toLocaleString());
            $('#totalnet2').val($totalnet);
            //Month
            $('#month_select').empty().append(data.monthHTML); 
            
            //Rate
            $('#daily_rate').val(data.daily_rate);
            $('#hour_rate').val(data.hour_rate);
            $('#minute_rate').val(data.minute_rate);

          
        },
        error:function(data){
            console.log(data);
        }
    })
  
  }


  function dedChange(){
    var dedsum = 0;
    $('.deductions').each(function(){
        dedsum = parseFloat(dedsum) + parseFloat(this.value);
    });
    $('#totalDed').val(dedsum);
    //TOTAL NET
            $totalnet = $('#totalAdd').val() - $('#totalDed').val();
            $('#totalnet').html('Total Net Amount: ₱'+$totalnet);
            $('#totalnet2').val($totalnet);
  }


// ABSENT/LATE
function ded_days(){
    
    var input_value = $('#input_days').val();
    var daily = $('#daily_rate').val();
    var dedsum = parseFloat(daily) * parseFloat(input_value);
    
    if(input_value == 0){
        var addsum = 0;
        $('.additionals').each(function(){
            addsum = parseFloat(addsum) + parseFloat(this.value);
        });
        $('#totalAdd').val(addsum);
        //TOTAL NET
                $totalnet = $('#totalAdd').val() - $('#totalDed').val();
                $('#totalnet').html('Total Net Amount: ₱'+$totalnet);
                $('#totalnet2').val($totalnet);

    } else{
        $total_gross = $('#totalAdd').val() - parseFloat(dedsum);
        $('#totalAdd').val($total_gross);
        //TOTAL NET
                $totalnet = $('#totalAdd').val() - $('#totalDed').val();
                $('#totalnet').html('Total Net Amount: ₱'+$totalnet);
                $('#totalnet2').val($totalnet);
    }
   
  }

  function ded_hours(){
    var input_value = $('#input_hours').val();
    var hours = $('#hour_rate').val();
    var dedsum = parseFloat(hours) * parseFloat(input_value);
    
    $total_gross = $('#totalAdd').val() - parseFloat(dedsum);
    $('#totalAdd').val($total_gross);
    //TOTAL NET
            $totalnet = $('#totalAdd').val() - $('#totalDed').val();
            $('#totalnet').html('Total Net Amount: ₱'+$totalnet);
            $('#totalnet2').val($totalnet);
  }

  function ded_minutes(){
    var input_value = $('#input_minutes').val();
    var minutes = $('#minute_rate').val();
    var dedsum = parseFloat(minutes) * parseFloat(input_value);
    
    $total_gross = $('#totalAdd').val() - parseFloat(dedsum);
    $('#totalAdd').val($total_gross);
    //TOTAL NET
            $totalnet = $('#totalAdd').val() - $('#totalDed').val();
            $('#totalnet').html('Total Net Amount: ₱'+$totalnet);
            $('#totalnet2').val($totalnet);
  }
  
  function addChange(){
    var addsum = 0;
    $('.additionals').each(function(){
        addsum = parseFloat(addsum) + parseFloat(this.value);
    });
    $('#totalAdd').val(addsum);
    //TOTAL NET
            $totalnet = $('#totalAdd').val() - $('#totalDed').val();
            $('#totalnet').html('Total Net Amount: ₱'+$totalnet);
            $('#totalnet2').val($totalnet);
  }
  
