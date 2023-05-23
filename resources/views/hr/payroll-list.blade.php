@extends('layout.master')
@section('payroll')
active
@endsection
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Position Section</title>
  <link rel="stylesheet" href="css/payroll.css" />
  <link rel="stylesheet" href="css/checkModal.css">
  <link rel="stylesheet" href="css/custom.css">
<link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500&display=swap" rel="stylesheet">

<style>
  .material-symbols-outlined:hover{
    background-color: #0076b69f;
    padding: 3px;
    border-radius: 5px;

}
</style>
</head>

<body>


  <div class="container">
    <div class="tab-container" style="margin-bottom: 10px;">
              
      <button class="tab-btn w3-button tab-active tablink" onclick="openCont(event,'cont1')">Generate Payslip</button>
      <button class="tab-btn w3-bar-item w3-button tablink" onclick="openCont(event,'cont2')">Table</button>
      {{-- <button class="tab-btn w3-bar-item w3-button tablink" onclick="openCont(event,'cont3')">Tokyo</button> --}}
   
  </div>
    <h4 class="position-label">Regular Employee Payroll</h4>
    {{-- <button id="positionBtn" class="material-symbols-outlined">
      library_add<span>Add</span></button> --}}
      <div id="cont1" class="w3-container w3-border city generate-payroll" >
          <div class="menu-container">
            <div class="row row-menu">
              <div class="col col-row bg-white" id="trylang">
                {{-- <h5 style="font-weight: normal">Date</h5>
                <select type="text" list="dates" name="" id="inputDate" onkeyup="inputDate()" placeholder="" class="w-100" style="margin-bottom: 10px;">
                  <option value="">January</option>
                </select> --}}
                  <h5 style="font-weight: normal">Search Employee Name/ID</h5>
                  <input type="text" list="names" name="" id="inputEmployee" onkeyup="inputEmployee()" placeholder="Name or ID" class="w-100">
                  <datalist id="names">
                    @foreach ($emp as $item)
                    <option>{{$item->first_name}} {{$item->middle_name}} {{$item->last_name}}</option>
                    @endforeach
                  </datalist>
                </div>
            </div>
            <div class="row row-menu">
            

              <div class="col col-row bg-white">
                {{-- <div class="text-center m-b-2">
                  <p>BUREAU OF FISHERIES AND AQUATIC RESOURCES REGIONAL <br> FISHERIES OFFICE - MIMAROPA</p>
                </div> --}}
                

                <div class="row m-b-5" id="header-content">
                  <div class="col">
                    <p>For the Period: {{$dateToday}} 
                      <select name="month_select" id="month_select">
                        <option value="" selected id="select_whole">Whole month</option>
                        <option value="" id="select_first" >XX-XX</option>
                        <option value="" id="select_second">XX-XX</option>
                      </select>
                  </p>
                    <p >Fund Cluster:</p>
                  </div>
                  <div class="col">
                    <p>No. of Days: {{$workindays}} days</p>
                    <p>N0. of Minutes: {{$workinminutes}} minutes</p>
                  </div>
                </div>
                <div class="row" style="display: flex; padding:5px; float:right" >
                  <button onclick="printPayslip()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" height="23" width="23"  style="align-items: center;">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                    </svg>
                    Print
                  </button>
                  {{-- <button style="">asdad</button>
                  <button style="">asdkjnafds</button> --}}
                </div>
                
                <input type="number" id="daily_rate" hidden>
                <input type="number" id="hour_rate" hidden>
                <input type="number" id="minute_rate" hidden>



                <div id="table-content">
                  <table class="w-100 payslip-tbl" style="table-layout: fixed">
                    <thead>
                      <tr>
                        <td colspan="2">
                          <p id="empFullname">Employee Name: XXXXXXXX</p>
                          <p id="empId">Employee ID: XXXXXX</p>

                        </td>
                        <td colspan="2">
                          <p id="empDepartment">Department: XXXXXXXX</p>
                          <p id="empPosition">Designation/Position: XXXXXX</p>

                        </td>
                      </tr>
                    </thead>
                    <tbody>
                  {{-- Header --}}
                      <tr>
                        <td style="width:100%" class="text-left ">Payments</td>
                        <td style="width:10%" class="text-center ">Amount</td>
                        <td style="width:40%" class="text-left">Other Deductions</td>
                        <td style="width:10%" class="text-center">Amount</td>
                      </tr>
                  {{-- EndHEader --}}

                      <tr >
                        <td class="text-left" style="align-content: flex-start">
                          <ul>
                            {{-- <li >Amount Earn</li> --}}
                            <li>Salary</li>
                          </ul>
                          <ul id="addlist">

                          </ul>
                          <p><b>Absent/Late</b></p>
                          <ul>
                            <li>Days</li>
                            <li>Hours</li>
                            <li>Minutes</li>
                          </ul>
                       
                         
                          
                        </td>
                        <td>
                          <ul>
                            {{-- <li><input type="number" name="empSalary" id="empSalary" class="text-right" value="0000"  >  </li> --}}
                            <li><input type="number" name="empEarned" id="empEarned" class="text-right additionals" value="0000" onchange="addChange()"></li>
                          </ul>
                          <ul id="addamount">

                          </ul>
                          <p class="text-right"><sub> </sub></p>
                          <ul class="m-t-5">
                            <li><input type="number" name="" id="input_days" class="text-right additionals" value="0" onchange="ded_days()"></li>
                            <li><input type="number" name="" id="input_hours" class="text-right additionals" value="0" onchange="ded_hours()"></li>
                            <li><input type="number" name="" id="input_minutes" class="text-right additionals" value="0" onchange="ded_minutes()"></li>
                          </ul>
                         
                      </td>

                        <td class="text-left">
                          <ul id="contrilist">
                            <li>Taxes</li>
                          </ul>
                          <ul id="dedlist">

                          </ul>
                        </td>
                        <td>
                          <ul id="contriamount">
                          <input type="number" class="text-right" name="" id="" value="0000">
                          </ul>
                          <ul id="dedamount">

                          </ul>
                        </td>
                      </tr>
                      
                      <tr>
                        <td  class="text-center">Gross after deduction of <br> Absent/Late (Php)</td>
                        <td ><input type="number" name="totalAdd" id="totalAdd" class="text-right" value="0000" readonly></td>
                       
                        <td class="text-center">total Deductions</td>
                        <td ><input type="number" name="totalDed" id="totalDed" class="text-right" value="0000" readonly></td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="4" class="text-right p-5" style="background: rgb(207, 207, 207); padding:15px;">
                         <p class="totalnet" id="totalnet">
                          Total Net Amount: 0000
                          </p> 
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                  
           
              </div>
            </div>
          </div>





      </div>



















    <div class="table-container city" id="cont2" style="display:none">
      <table id="positionTable" class="hover row-border" style="width:100%; font-size:5px;">
        <thead>
          <tr>
            <th></th>
            <th>Employee ID</th>
            <th>Name</th>
            <th>Monthly Salary</th>
            <th>Bonus/Allowance</th>
            <th>Total Deduction</th>
            <th>Net Amount Received</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($emp as $item)
          <tr>
            <td>
              <a href="/payroll-check/{{Crypt::encrypt($item->id)}}">Check</a>
              |
              <a href="">Generate Slip</a>
            </td>
            <td>000{{$item->id}}</td>
            <td>{{$item->first_name}} {{$item->middle_name}} {{$item->last_name}} {{$item->suffix}}</td>
            {{-- <td>{{$item->position}}</td>
            <td>{{$item->department}}</td> --}}

            <td class="text-center">
              <div class="cont2" style="display: flex; gap:2rem;">
                @if(isset($item->monthly_rate))
                
                <div class="rate">
                  <span>&#8369;</span>{{$item->monthly_rate}}.00
                </div>
                <div class="rate-btn" style="float: right;">
                  <button type="button" class="inputupdate1" onclick="inputupdate1({{$item->id}})">
                    <span class="material-symbols-outlined">
                      edit
                    </span>
                  </button>
                </div>
                @else
                <div class="rate">
                  <i style="color:rgb(248, 68, 68)">No Data</i>
                </div>
                <div class="rate-btn" style="float: right">
                  <button type="button" class="inputupdate1" onclick="inputupdate1({{$item->id}})">
                    <span class="material-symbols-outlined">
                      edit
                    </span>
                  </button>
                </div>

                @endif
              </div>

              <td class="text-center">
                @if (isset($TotalAdditional[$item->id]))
                      @foreach ($TotalAdditional  as $key => $value) 
                        @if ($key == $item->id)
                        <span>&#8369;</span>{{$value}}.00
                        @endif
                      @endforeach
                    @else
                    <i>No Data</i>
                 @endif
              </td>
            </td>
            
              <td class="text-center">
                @if (isset($TotalDeduction[$item->id]))
                    @foreach ($TotalDeduction  as $key => $value) 
                        @if ($key == $item->id)
                        <span>&#8369;</span>{{$value}}.00
                        @endif
                    @endforeach
                  @else
                  <i>No Data</i>
                @endif
                {{-- <br>
                <i><a href="/checkdeductiondetails/{{Crypt::encrypt($item->id)}}" class="tableBtn" title="Check deduction">click for the details</a>
                </i> --}}
              </td>

            
              <td class="text-center">
                @foreach ($TotalNet  as $key => $value) 
                @if ($key == $item->id)
                <span>&#8369;</span>{{$value}}.00
                @endif
            @endforeach</td>
              </td>

          </tr>
          @endforeach

        </tbody>
      </table>
    </div>

    <div id="posModal" class="modal">
      <div class="modal-container">
        <div class="modal-header">
          <a href="/position" class="href"><span class="material-symbols-outlined exit-icon">
              close
            </span></a>
          <h2 class="position-label">Add Position</h2>
        </div>
        <div class="modal-form">
          <form action="/position-save" method="POST">
            @csrf
            <label for="division">Division</label>
            <select name="division" id="division" aria-placeholder="">
              @foreach ($dept as $item)
              <option value="{{$item->id}}">{{$item->code}}</option>
              @endforeach
            </select>
            <div class="form-item-modal">
              <span class="material-symbols-outlined modal-icon">
                badge
              </span>
              <input type="text" name="name" id="name" placeholder="Name">
            </div>
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
            <div class="modal-buttons">
              <button class="noselect"><span class="text">Reset</span><span class="icon"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path
                      d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z">
                    </path>
                  </svg></span></button>
              <button type="submit" class="submit-modal">
                <span>Submit</span>
                <svg class="svg-modal-submit" width="34" height="34" viewBox="0 0 74 74" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <circle cx="37" cy="37" r="35.5" stroke="white" stroke-width="3"></circle>
                  <path
                    d="M25 35.5C24.1716 35.5 23.5 36.1716 23.5 37C23.5 37.8284 24.1716 38.5 25 38.5V35.5ZM49.0607 38.0607C49.6464 37.4749 49.6464 36.5251 49.0607 35.9393L39.5147 26.3934C38.9289 25.8076 37.9792 25.8076 37.3934 26.3934C36.8076 26.9792 36.8076 27.9289 37.3934 28.5147L45.8787 37L37.3934 45.4853C36.8076 46.0711 36.8076 47.0208 37.3934 47.6066C37.9792 48.1924 38.9289 48.1924 39.5147 47.6066L49.0607 38.0607ZM25 38.5L48 38.5V35.5L25 35.5V38.5Z"
                    fill="white"></path>
                </svg>
              </button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <div id="monthlyratemodal" class="monthlyratemodal">
    <div class="monthlyratemodal-container">
      <div class="monthlyratemodal-header">


        <h2 class="monthlyratemodal-label" id="mrate_label">Update Monthly Rate</h2>
      </div>
      <div class="monthlyratemodal-form">
        <form action="/monthlyrate_update" method="post">
          @csrf
          <input type="text" name="id2" hidden>
          <input type="number" name="mrate2">

          <div class="button-container">
            <button type="submit">Update</button>
            <button type="button" class="cancelbtn" onclick="cancelbutton()">Cancel</button>
          </div>

        </form>
      </div>
    </div>
  </div>


  <!-- {{-- checkModal --}} -->
  {{-- <div class="modal-check" id="checkModal">
    <div class="check-modal-container">
      <div class="check-modal-headear">
        <span style="float:right" class="close2">
          <a href="#" style="font-size: 1.5rem; padding:2px;" onclick="closeModal()">X</a>
        </span>
        <h1 id="fullnameemployee"></h1>
        <h4 class="check-modal-label">
          Allowance and Deduction Details
        </h4>
        <p id="try">Employee Name: Fabroa, John Russel C.</p>
        <p id="try">Employee No.:</p>

      </div>
      <hr>
      <div class="check-modal-body" >

        <div class="checkTable">
          <div class="check-header">
            <div class="row">
              <div class="col text-center" style="border-right: 1px solid rgba(128, 128, 128, 0.404)">
                Deductions
              </div>
              <div class="col text-center">
                Allowances
              </div>
            </div>
          </div>

          <div class="check-body">
            <div class="row">
              <div class="col" style="border-right: 1px solid rgba(128, 128, 128, 0.404);">
                <button href="#" type="button" class="float-right" onclick="addDeduc()" style="margin-right:1rem;">ADD</button> <br>
                <div class="deducName" style="margin-top: 1rem">
                  <table>

                    @foreach ($fixed_deduc as $item)
                    <tr>
                      <td width="60%" style="padding: 2px">
                        <p>{{$item->name}}</p>
                      </td>

                      <td width="40%" style="padding: 2px; display:flex; gap:5px">
                        <input type="text" name="" id="" value="{{$item->percentage}}" readonly>
                        <a href="edit"><span class="material-symbols-outlined">edit</span></a>
                        <a href="edit"><span class="material-symbols-outlined">save</span></a>
                      </td>
                    </tr>
                    @endforeach

                  </table>



                  <p class=""><b>Other Deduction</b></p>
                  <table>
                    <tr>
                      <td width="60%" style="padding: 2px">
                        <p>GSIS Per Share </p>
                      </td>

                      <td width="40%" style="padding: 2px; display:flex; gap:5px">
                        <input type="text" name="" id="" value="232908" readonly>
                        <a href="edit"><span class="material-symbols-outlined">edit</span></a>
                        <a href="edit"><span class="material-symbols-outlined">save</span></a>
                      </td>
                    </tr>

                    <tr>
                      <td width="60%" style="padding: 2px">
                        <p>Medicare 4% </p>
                      </td>

                      <td width="40%" style="padding: 2px; display:flex; gap:5px">
                        <input type="text" name="" id="" value="232908" readonly>
                        <a href="edit"><span class="material-symbols-outlined">edit</span></a>
                        <a href="edit"><span class="material-symbols-outlined">save</span></a>
                      </td>
                    </tr>

                    <tr>
                      <td width="60%" style="padding: 2px">
                        <p>Pag-Ibig</p>
                      </td>

                      <td width="40%" style="padding: 2px; display:flex; gap:5px">
                        <input type="text" name="" id="" value="232908" readonly>
                        <a href="edit"><span class="material-symbols-outlined">edit</span></a>
                        <a href="edit"><span class="material-symbols-outlined">save</span></a>
                      </td>
                    </tr>

                    <tr>
                      <td width="60%" style="padding: 2px">
                        <p>Withholding Tax</p>
                      </td>

                      <td width="40%" style="padding: 2px; display:flex; gap:5px">
                        <input type="text" name="" id="" value="232908" readonly>
                        <a href="edit"><span class="material-symbols-outlined">edit</span></a>
                        <a href="edit"><span class="material-symbols-outlined">save</span></a>
                      </td>


                    </tr>
                  </table>

                </div>



              </div>
              <div class="col" ">

                  </div>
                
                </div>
              </div>
            </div>
              </div>

            </div>

          </div> --}}



          
  <!-- {{-- AddcheckModal --}} -->
  {{-- <div class="addDeductionModal" id="addDeductionModal">
    <div class="addDeductionModal-container">
      <div class="addDeductionModal-headear">
        <span style="float:right" class="close2">
          <a href="#" style="font-size: 1.5rem; padding:2px;" onclick="closeModal2()">X</a>
        </span>
        <h1 id="fullnameemployee"></h1>
        <h4 class="addDeductionModal-label">
          Add Deduction
        </h4>
        <p id="try"></p>
      </div>
      <hr>
          <div class="addDeductionModal-body">
                
          </div>
    </div>
  </div> --}}




</body>
<script src="/js/payroll.js"></script>
<script src="/js/positionModal.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function () {
    $('#positionTable tbody').on('click', 'tr', function () {
      $(this).toggleClass('selected');
    });
    $('#positionTable').DataTable({
      scrollY: '45vh',
      scrollCollapse: true,
      scrollX: 'auto',
      paging: true,
    });
  });
</script>

</html>
@endsection