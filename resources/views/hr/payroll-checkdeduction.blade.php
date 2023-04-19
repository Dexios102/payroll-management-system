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
  <link rel="stylesheet" href="/css/payroll.css" />
  <link rel="stylesheet" href="/css/checkModal.css">
  <link rel="stylesheet" href="/css/custom.css">
<style>

  table {
  border-collapse: collapse;
  background-color: white;
  overflow: hidden;
  
  /* border-radius: 10px; */
  }
  thead{
    border-bottom: 2px solid rgba(67, 67, 135, 0.655);
  }

th, td {
  border: 1px solid rgba(141, 137, 137, 0.163);
  border-gap: 0;
  text-align: left;
  font-size: 13px;
  padding: 5px;
}

th {
  background-color: #1b4062;
  color: rgb(255, 255, 255);
}
</style>
</head>

<body>


  <div class="container">
    <h4 class="position-label">Deduction Details</h4>
    {{-- <button id="positionBtn" class="material-symbols-outlined">
      library_add<span>Add</span></button> --}}
    <div class="table-container">

      <div class="check-modal-headear">
        <span style="float:right" class="close2">
          <a href="/payroll" style="font-size: 1.5rem; padding:2px;">Back</a>
        </span>
        <h1 id="fullnameemployee"></h1>
        <h4 class="check-modal-label">

        </h4>
        <p id="try">Employee Name: {{$emp->last_name}}, {{$emp->first_name}} {{$emp->middle_name}} {{$emp->suffix}}</p>
        <p id="try">Employee No.: @if (isset($emp->id))000{{$emp->id}}

          @else
          <i>No Data</i>
          @endif
        </p>

      </div>
      <hr>
      <div class="check-modal-body">
          <div class="check-header">
            <button href="#" type="button" class="btn-blue" onclick="addDeduc()"
              style="margin:0.6rem;">ADD
            </button>
              <div class="label" style="border-right: 1px solid rgba(128, 128, 128, 0.404)">
                Deductions
              </div>
          
          </div>

          <div class="check-body">

              <table style="width:100%">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>%</th>
                    <th>Deduction every month</th>
                   
                    
                    <th>Balance</th>
                    <th>Status</th>
                    <th>Actions</th>

                  </tr>
                </thead>
                @if ($f_count != 0)
                <tbody>
                      @foreach ($f_dec as $item)
                        <tr>
                          <td>
                            <p>{{$item->deduction_info->name}}</p>
                          </td>
                          <td>{{$item->interest}}</td>
                          <td>
                            <form action="/payrolldeduction-update/{{$item->id}}" method="post">
                              @csrf
                              <input type="text" name="id2" id="" value="{{$item->id}}" hidden>
                              <input type="text" name="f_deduction{{$item->id}}" id="f_deduction{{$item->id}}" value="{{$item->monthly_deduction}}" readonly>
                              
                              <button type="button" onclick="btninputshow({{$item->id}})" onclick=""><span class="material-symbols-outlined">edit</span></button>
                              <button id="updBtn{{$item->id}}"  type="submit" disabled><span class="material-symbols-outlined">save</span></button>
                            </form>
                          
                        </td>
      
                          {{-- <td width="" style="padding: 2px; display:flex; gap:5px">
                            
                          </td> --}}
                          
                          <td>{{$item->balance}}</td>
                          <td>@if ($item->deleted_at == null)
                              Active
                          @else
                              Inactive
                          @endif
                        </td>
                        <td>
                          <a href="">Update</a>
                          <a href="">Delete</a>
                        </td>
                        </tr>
                    @endforeach     
                </tbody>
                @else
                <tbody>
                  <tr>
                    <td colspan="6" class="text-center">
                      <i style="color: rgb(245, 69, 69)">No Data....</i> 
                      <a href="/deduction-fixed/{{$emp->id}}">Generate fixed deductions</a>
                    </td>
                  </tr>
                </tbody>
                
                @endif
               
              </table>
<hr>
              <div class="label" style="border-right: 1px solid rgba(128, 128, 128, 0.404); margin-top:20px;">
                Other Deductions
              </div>
              <table style="width:100%">
                <thead>
                  <th>Name</th>
                  <th>Total Loan</th>
                  <th>Deduction every month</th>
                 
                  
                  <th>Balance</th>
                  <th>Status</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                  @foreach ($p_dec as $item)
                  <tr>
                    <td >
                      <p>{{$item->deduction_info->name}}</p>
                    </td>
                    <td>{{$item->total_amount}}</td>
                    <td>
                      <form action="/payrolldeduction-update/{{$item->id}}" method="post">
                        @csrf
                      <input type="text" name="f_deduction{{$item->id}}" id="f_deduction{{$item->id}}" value="{{$item->monthly_deduction}}" readonly>
                      <button type="button" onclick="btninputshow({{$item->id}})" onclick=""><span class="material-symbols-outlined">edit</span></button>
                      <button id="updBtn{{$item->id}}"  type="submit" disabled><span class="material-symbols-outlined">save</span></button>
                    </form>
                    </td>
                  
                      
                    
                    <td>{{$item->balance}}</td>
                    <td>Active</td>
                    <td>
                      <a href="">Update</a>
                      <a href="">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                 
  
                
                </tbody>
               
              </table>
            </div>


          </div>
        </div>











      <!-- {{-- AddcheckModal --}} -->
      <div class="addDeductionModal" id="addDeductionModal">
        <div class="addDeductionModal-container">
          <div class="addDeductionModal-headear">
            <span style="float:right" class="close2">
              <a href="#" style="font-size: 1.5rem; padding:2px;" onclick="closeModal2()">X</a>
            </span>
            <h1 id="fullnameemployee"></h1>
            <h4 class="addDeductionModal-label">
              Add
            </h4>
            <p id="try"></p>
          </div>
          <hr>
          <div class="addDeductionModal-body" style="margin-top: 5px;">
            <div class="modal-form">
              <form action="/payrolldeduction-save" method="POST">
                @csrf
                <input type="text" name="employee_id" id="" value="{{$emp->id}}" hidden>
                <select name="deduction" id="deduction" aria-placeholder="">
                  @foreach ($ded as $item)
                  <option value="{{$item->id}}">{{$item->name}}(<i>minimum:{{$item->minimum_loan}}</i>)</option>
                  @endforeach
                </select>
                <div class="form-item-modal">
                  <span class="material-symbols-outlined modal-icon">
                    overview_key
                  </span>
                  <input type="number" name="total_amount" id="total_amount" placeholder="Total Amount">
                </div>
                <div class="form-item-modal">
                  <span class="material-symbols-outlined modal-icon">
                    location_away
                  </span>
                  <input type="number" name="percentage" id="percentage" placeholder="Percentage(per month)">
                </div>

                <br>

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
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>




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

<script>
  function btninputshow($id) {
    let input = document.querySelector('#f_deduction'+$id);
    if (input.readOnly) {
        input.readOnly = false;

        document.querySelector('.label').addClass('malaking-font');
        

        input.onchange = function() {
          let btn = document.querySelector('#updBtn'+$id);
          btn.disabled = false;
        };
        
    }
    else {
        input.readOnly = true;

        let btn = document.querySelector('#updBtn'+$id);
        btn.disabled = true;
    }
}


</script>



</html>
@endsection