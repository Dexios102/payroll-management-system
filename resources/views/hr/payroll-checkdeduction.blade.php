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

</head>

<body>


  <div class="container">
    <h4 class="position-label">Allowance and Deduction Details</h4>
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
        @endif</p>

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

</html>
@endsection