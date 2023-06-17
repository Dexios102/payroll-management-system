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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500&family=Fira+Sans:wght@200;300;400&family=Nunito&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/css/custom.css">
  <link rel="stylesheet" href="/css/checkModal.css">
  <link rel="stylesheet" href="/css/Payroll/payroll-main.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .payroll-table {
      width: 100%;
      border: 1px solid black;
    }

    .payroll-table th,
    .payroll-table td {
      border: 1px solid black;
      padding: 2px;
      text-align: center;
    }

    .payroll-table .text-left {
      text-align: left;
    }

    .payroll-table .text-right {
      text-align: right;
    }

    .payroll-table .text-gray {
      color: gray;
    }

    .payroll-table ul {
      padding-left: 0;
      list-style: none;
    }

    .addDeductionModal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
  }

  .addDeductionModal-container {
    background-color: #fefefe;
    margin: 10% auto;
    padding: 20px;
    border: 1px solid #888;
    width: fit-content;
  }

  .modal-buttons {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    gap: 4rem;
  }
  </style>
</head>

<body>
  <div class="all-main-container">
    <div class="payroll-container">
      <div class="text-center">
        <h4 style="font-size: 80%;">REPUBLIKA NG PILIPINAS</h4>
        <h4 style="font-size: 80%;">KAGAWARAN NG PAGSASAKA</h4>
        <h4 class="container-label" style="font-family: 'Loro', serif; font-size: 80%;">PAYROLL<br>For the Period of March 1-31, 2023</h4>
        {{-- <a href="/payroll-print/{{Crypt::encrypt($emp->id)}}" class="float-right" style="font-size: 80%;">Print</a> --}}
      </div>
      <div class="flex flex-row justify-between">
        <div>
          <p style="font-size: 80%;">Entinty Name: BFAR MIMAROPA REGION</p>
          <p style="font-size: 80%;">Fund Cluster: Regular Fund</p>
        </div>
        <div>
          <p style="font-size: 80%;">Payroll No.: _______________</p>
          <p style="font-size: 80%;">Sheet 1 of 5 Sheets</p>
        </div>
      </div>
      <p style="font-weight: normal; margin-top: 8px; font-size: 80%;">
        We acknowledge receipt of cash shown opposite our name as full compensation for services rendered for the period covered.
      </p>
      <div class="table-responsive" style="overflow-x: auto;">
        <table class="payroll-table">
          <tr>
            <th rowspan="4" colspan="2" style="font-size: 80%;">NAME OF EMPLOYEE</th>
            <th rowspan="4" style="font-size: 80%;">MONTHLY SALARY</th>
            @foreach ($payrollAdd as $item)
            <th rowspan="4" style="font-size: 80%;">{{ $item->allowance_info->name }}</th>
            @endforeach
            @if ($f_count == 1)
            <th colspan="4" rowspan="2" style="font-size: 80%;">Deductions</th>
            @elseif ($f_count == 2)
            <th colspan="5" rowspan="2" style="font-size: 80%;">Deductions</th>
            @elseif ($f_count == 3)
            <th colspan="6" rowspan="2" style="font-size: 80%;">Deductions</th>
            @elseif ($f_count == 4)
            <th colspan="7" rowspan="2" style="font-size: 80%;">Deductions</th>
            @elseif ($f_count == 5)
            <th colspan="8" rowspan="2" style="font-size: 80%;">Deductions</th>
            @else
            <th colspan="3" rowspan="2" style="font-size: 80%;">Deductions</th>
            @endif
            <th rowspan="4" style="font-size: 80%;">NET AMOUNT RECEIVED<br>MARCH 1-23, 2023</th>
            <th rowspan="4" style="font-size: 80%;">Signature of<br>Payee</th>
          </tr>
          <tr></tr>
          <tr>
            @foreach ($f_dec as $item)
            <td rowspan="2" style="font-size: 80%;">{{ $item->deduction_info->name }}</td>
            @endforeach
            <td rowspan="1" colspan="3" style="font-size: 80%;">OTHER</td>
          </tr>
          <tr>
            <td style="font-size: 80%;">Code</td>
            <td style="font-size: 80%;">Description</td>
            <td style="font-size: 80%;">Amount</td>
          </tr>
          <tr>
            <td colspan="2" rowspan="2" class="text-left">
              <div class="p-2">
                <i style="font-size: 80%;">{{ $emp->id }}. {{ $emp->first_name }} {{ $emp->middle_name }} {{ $emp->last_name }}</i><br>
                <i style="font-size: 80%;">Employee No: {{ $emp->employee_no }}</i><br>
                <i style="font-size: 80%;">Position: {{ $emp->position }}</i><br>
                <i style="font-size: 80%;">Designation: {{ $emp->department }}</i>
              </div>
            </td>
            <td style="font-size: 80%;">{{ $emp->monthly_rate }}.00</td>
            @foreach ($payrollAdd as $item)
            <td rowspan="4" style="font-size: 80%;">{{ $item->amount }}</td>
            @endforeach
            @foreach ($f_dec as $item)
            <td style="font-size: 80%;">{{ $item->monthly_deduction }}<br><i class="text-gray text-sm" style="font-size: 80%;">({{ $item->interest }}% of Basic salary)</i></td>
            @endforeach
            <td>
              <ul>
                @foreach ($other_ded as $item)
                <li style="font-size: 80%;">{{ $item->id }}</li>
                @endforeach
              </ul>
            </td>
            <td>
              <ul>
                @foreach ($other_ded as $item)
                <li style="font-size: 80%;">{{ $item->deduction_info->name }}</li>
                @endforeach
              </ul>
            </td>
            <td>
              <ul>
                @foreach ($other_ded as $item)
                <li style="font-size: 80%;">{{ $item->monthly_deduction }}</li>
                @endforeach
              </ul>
            </td>
            <td rowspan="2" style="font-size: 80%;">
              {{ $half_net }}.00<br> {{ $half_net }}.00 <br>
              <i class="text-gray text-sm" style="font-size: 80%;">Total: {{ $total_net }}.00</i>
            </td>
          </tr>
          <tr>
            @if ($add_count == 1)
            <th colspan="2" style="font-size: 80%;"></th>
            @elseif ($add_count == 2)
            <th colspan="3" style="font-size: 80%;"></th>
            @elseif ($add_count == 3)
            <th colspan="4" style="font-size: 80%;"></th>
            @elseif ($add_count == 4)
            <th colspan="5" style="font-size: 80%;"></th>
            @elseif ($add_count == 5)
            <th colspan="6" style="font-size: 80%;"></th>
            @elseif ($add_count == 0)
            <th colspan="1" style="font-size: 80%;"></th>
            @else
            <th colspan="2" style="font-size: 80%;"></th>
            @endif
            @if ($f_count >= 1)
            <td colspan="{{ $f_count }}" class="text-right" style="font-size: 80%;"><span class="text-sm">Total contribution: {{ $total_f }}</span></td>
            @endif
            <td colspan="2" class="text-end" style="font-size: 80%;">Total</td>
            <td style="font-size: 80%;">{{ $total_ded }}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="all-main-container">
    <div class="all-main-header-label">
      Employee Data
    </div>
    <div class="table-container">

      <div class="tab-container">

        <button class="tab-btn w3-button tab-active tablink" onclick="openCont(event,'cont1')">Additionals</button>
        <button class="tab-btn w3-bar-item w3-button tablink" onclick="openCont(event,'cont2')">Deductions</button>
        {{-- <button class="tab-btn w3-bar-item w3-button tablink" onclick="openCont(event,'cont3')">Tokyo</button> --}}

      </div>


      <div class="check-modal-headear">
        {{-- <span style="float:right" class="close2">
                <a href="/payroll" style="font-size: 1.5rem; padding:2px;">Back</a>
              </span> --}}
        <h1 id="fullnameemployee"></h1>
        <h4 class="check-modal-label">

        </h4>
        <div class="emp-details" style="padding:5px;">
          <p id="try">Employee Name: {{$emp->last_name}}, {{$emp->first_name}} {{$emp->middle_name}} {{$emp->suffix}}</p>
          <p id="try">Employee No.: @if (isset($emp->id))000{{$emp->id}}
        </div>


        @else
        <i>No Data</i>
        @endif
        </p>

      </div>
      <hr>
      <div id="cont1" class="w3-container w3-border city">
        <button href="#" type="button" class="btn-blue" onclick="addAllowance()" style="margin:0.6rem;">ADD
        </button>
        <div class="label" style="border-right: 1px solid rgba(128, 128, 128, 0.404)">
          Additionals(allowance, bonus, etc.)
        </div>
        <table class="w-100">
          <thead class="thead-blue-white w-100">
            <tr>
              <th>Code</th>
              <th>Name</th>
              <th>Amount</th>
              <th>Due</th>
              <th>Status</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($payrollAdd_all as $item)
            <tr class="text-center">
              <td>{{$item->allowance_info->code}}</td>
              <td>{{$item->allowance_info->name}}</td>
              <td>{{$item->amount}}</td>
              <td>{{$item->due}}</td>
              <td>
                @if ($item->status == 'active')
                <a href="/additionalStatus-edit/{{$item->id}}" class="btn-edit">{{$item->status}}</a>
                @else
                <a href="/additionalStatus-edit/{{$item->id}}" class="btn-delete">{{$item->status}}</a>
                @endif
              </td>
              <td>
                <button type="button" class=""></button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      {{-- container 2 --}}
      <div id="cont2" class="w3-container w3-border city" style="display:none">
        <div class="check-modal-body">
          <div class="check-header">
            <button href="#" type="button" class="btn-blue" onclick="addDeduc()" style="margin:0.6rem;">Add Deduction
            </button>
            <div class="label" style="border-right: 1px solid rgba(128, 128, 128, 0.404)">
              Contributions
            </div>
          </div>
          <div class="check-body">
            <table style="width:100%">
              <thead class="thead-blue-white">
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
                @foreach ($f_ded_all as $item)
                <tr>
                  <td>
                    <p>{{$item->deduction_info->name}}</p>
                  </td>
                  <td>{{$item->interest}}%</td>
                  <td>
                    <form action="/payrolldeduction2-update/{{$item->id}}" method="post">
                      @csrf
                      <input type="text" name="id2" id="" value="{{$item->id}}" hidden>
                      <input type="text" name="f_deduction{{$item->id}}" id="f_deduction{{$item->id}}" value="{{$item->monthly_deduction}}" readonly>
                      <button type="button" onclick="btninputshow({{$item->id}})" onclick=""><span class="material-symbols-outlined">edit</span></button>
                      <button id="updBtn{{$item->id}}" type="submit" disabled><span class="material-symbols-outlined">save</span></button>
                    </form>
                  </td>
                  {{-- <td width="" style="padding: 2px; display:flex; gap:5px">              
                                </td> --}}
                  <td>{{$item->balance}}</td>
                  <td>
                    @if ($item->status == 'active')
                    <a href="/contributionStatus-edit/{{$item->id}}" class="btn-edit">{{$item->status}}</a>
                    @else
                    <a href="/contributionStatus-edit/{{$item->id}}" class="btn-delete">{{$item->status}}</a>
                    @endif
                  </td>
                  <td>
                    <button type="button">Update</button>
                    <button type="button" onclick="deleteDeduc2({{$item->id}})">Delete</button>
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
              <thead class="thead-blue-white">
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
                  <td>
                    <p>{{$item->deduction_info->name}}</p>
                  </td>
                  <td>{{$item->total_amount}}</td>
                  <td>
                    <form action="/payrolldeduction-update/{{$item->id}}" method="post">
                      @csrf
                      <input type="text" name="f_deduction{{$item->id}}" id="f_deduction{{$item->id}}" value="{{$item->monthly_deduction}}" readonly>
                      <button type="button" onclick="btninputshow({{$item->id}})" onclick=""><span class="material-symbols-outlined">edit</span></button>
                      <button id="updBtn{{$item->id}}" type="submit" disabled><span class="material-symbols-outlined">save</span></button>
                    </form>
                  </td>
                  <td>{{$item->balance}}</td>
                  <td>
                    @if ($item->status == 'active')
                    <a href="/contributionStatus2-edit/{{$item->id}}" class="btn-edit">{{$item->status}}</a>
                    @else
                    <a href="/contributionStatus2-edit/{{$item->id}}" class="btn-delete">{{$item->status}}</a>
                    @endif
                  </td>
                  <td>
                    <button type="button">Update</button>
                    <button type="button" onclick="deleteDeduc({{$item->id}})">Delete</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
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
      

               <!-- {{-- AddcheckModal --}} -->
               <div class="addDeductionModal" id="additionalModal">
                <div class="addDeductionModal-container">
                  <div class="addDeductionModal-headear">
                    <span style="float:right" class="close2">
                      <a href="#" style="font-size: 1.5rem; padding:2px;" onclick="closeModal3()">X</a>
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
                      <form action="/payrolladditional-save" method="POST">
                        @csrf
                        <input type="text" name="employee_id" id="" value="{{$emp->id}}" hidden>
                        <select name="deduction" id="deduction" aria-placeholder="">
                          @foreach ($allowance as $item)
                          <option value="{{$item->id}}">{{$item->name}}</i></option>
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
                          <input type="number" name="due" id="due" placeholder="Due">
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
<script src="/js/payrollFunction/payroll.js"></script>
<script>
  function btninputshow($id) {
    let input = document.querySelector('#f_deduction'+$id);
    if (input.readOnly) {
        input.readOnly = false;

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
<script>
  function openModal() {
    var modal = document.getElementById('addDeductionModal');
    modal.style.display = 'block';
  }

  function closeModal() {
    var modal = document.getElementById('addDeductionModal');
    modal.style.display = 'none';
  }
</script>

</html>
@endsection