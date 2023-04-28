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

  <style>
    *{
     
    }
    table {
      border-spacing: 0;
    }
    p{
     font-family: 'Loro', serif;
     font-weight: bold;
    }
    .payroll-table th,
    td {
      border: 1px solid rgb(97, 96, 96);
      max-width: 100%;
      white-space: nowrap;
      border-spacing: 0;
      padding: 5px;
    }
    .payroll-table li{
      text-decoration: none;
      list-style: none;
    }

    
  </style>
</head>

<body>


  <div class="container">
    <div class="payroll-container" style="overflow: auto">
      <div class="text-center">
        <h4>REPUBLIKA NG PILIPINAS</h4>
        <h4>KAGAWARAN NG PAGSASAKA</h4>
        <h4 class="container-label" style="font-family: 'Loro', serif">PAYROLL
          <br>For the Period of March 1-31, 2023
        </h4>
        {{-- <a href="/payroll-print/{{Crypt::encrypt($emp->id)}}" class="float-right ">Print</a> --}}
      </div>
      <div class="row" style="">
        <div class="col">
            <p >Entinty Name : BFAR MIMAROPA REGION</p>
            <p>Fund Cluster: Regular Fund</p>
        </div>
        <div class="col">
          <p>Payroll No.: _______________</p>
          <p>Sheet 1 of 5 Sheets</p>
        </div>
        
      </div>
      <p style="font-weight: normal; margin-top:10px;">We acknowledge receipt of cash shown opposite our name as full compensation for services rendered for the period covered.</p>
      <table style="width:100%; border:1px solid black" class="payroll-table">
        <tr>
          <th rowspan="4" colspan="2" style="text-align: center; width:fit-content">NAME OF EMPLOYEE</th>
          <th rowspan="4" style="text-align: center">MONTHLY SALARY</th>
          @foreach ($payrollAdd as $item)
            <th rowspan="4" style="text-align: center">{{$item->allowance_info->name}}</th>
            @endforeach


          @if($f_count == 1)
          <th colspan="4" rowspan="2" style="text-align: center">Deductions</th>
          @elseif($f_count == 2)
          <th colspan="5" rowspan="2" style="text-align: center">Deductions</th>
          @elseif($f_count == 3)
          <th colspan="6" rowspan="2" style="text-align: center">Deductions</th>
          @elseif($f_count == 4)
          <th colspan="7" rowspan="2" style="text-align: center">Deductions</th>
          @elseif($f_count == 5)
          <th colspan="8" rowspan="2" style="text-align: center">Deductions</th>
          @else
          <th colspan="3" rowspan="2" style="text-align: center">Deductions</th>
          @endif



          <th rowspan="4" style="text-align: center">NET AMOUNT RECEIVED <br> MARCH 1-23, 2023</th>
          <th rowspan="4">Signature of <br> Payee</th>
        </tr>
        <tr>

        </tr>
        <tr>
          @foreach ($f_dec as $item)
          <td rowspan="2" style="text-align: center">{{$item->deduction_info->name}}</td>
          @endforeach
          
          {{-- <td rowspan="2" style="text-align: center">Mediacare</td>
          <td rowspan="2" style="text-align: center">Pag-big</td>
          <td rowspan="2" style="text-align: center">Withholding Tax</td> --}}
          <td rowspan="1" colspan="3" style="text-align: center">OTHER</td>
        </tr>
        <tr>
          <td style="text-align: center">Code</td>
          <td style="text-align: center">Description</td>
          <td style="text-align: center">Amount</td>
        </tr>
        <tr>
          <td colspan="2" rowspan="2">
            <div class="d-block p-3">
              <i>{{$emp->id}}. {{$emp->first_name}} {{$emp->middle_name}} {{$emp->last_name}}</i><br>
              <i>Employee No: {{$emp->employee_no}}</i><br>
              <i>Position: {{$emp->position}}</i><br>
              <i>Designation: {{$emp->department}}</i>
            </div>
          </td>


          <td class="text-center">{{$emp->monthly_rate}}.00</td>
          
          @foreach ($payrollAdd as $item)
            <td rowspan="4" style="text-align: center">{{$item->amount}}</td>
            @endforeach


           @foreach ($f_dec as $item)
          <td style="text-align: center">{{$item->monthly_deduction}}<br><i style="color: rgb(100, 96, 93); font-size:15px;">({{$item->interest}}% of Basic salary)</i></td>
          @endforeach
          {{-- <td style="text-align: center">5</td>
          <td style="text-align: center">100.00</td> --}}
          {{-- <td style="text-align: center">7</td> --}}

          <td style="text-align: center">
            <ul>
              @foreach ($other_ded as $item)
                  <li>{{$item->id}}</li>
                  
              @endforeach
            </ul>
          </td>

          <td style="text-align: center">
            <ul>
              @foreach ($other_ded as $item)
              <li>{{$item->deduction_info->name}}</li>
              @endforeach
            </ul>
          </td>
          <td style="text-align: center">
            <ul>
              @foreach ($other_ded as $item)
              <li>{{$item->monthly_deduction}}</li>
              @endforeach
              {{-- <hr>
              <li>{{$total_ded}}</li> --}}
            </ul>
          </td>
          <td rowspan="2" style="text-align: center">
            {{$half_net}}.00<br> {{$half_net}}.00 <br>
            <i style="color: rgb(100, 96, 93); font-size:15px;">Total: {{$total_net}}.00</i>
          </td>
         

        </tr>
        <tr>
          @if($add_count == 1)
          <th colspan="2"  style="text-align: center"></th>
          @elseif($add_count == 2)
          <th colspan="3"  style="text-align: center; "></th>
          @elseif($add_count == 3)
          <th colspan="4"  style="text-align: center"></th>
          @elseif($add_count == 4)
          <th colspan="5"  style="text-align: center"></th>
          @elseif($add_count == 5)
          <th colspan="6"  style="text-align: center"></th>
          @elseif($add_count == 0)
          <th colspan="1"  style="text-align: center"></th>
          @else
          <th colspan="2"  style="text-align: center"></th>
          @endif
          
          @if($f_count == 1)
          <td colspan="1" style="text-align: center"><span style="font-size:13px">Total contribution: {{$total_f}}</span></td>
          @elseif($f_count == 2)
          <td colspan="2" style="text-align: center"><span style="font-size:13px">Total contribution: {{$total_f}}</span></td>
          @elseif($f_count == 3)
          <td colspan="3" style="text-align: center"><span style="font-size:13px">Total contribution: {{$total_f}}</span></td>
          @elseif($f_count == 4)
          <td colspan="4" style="text-align: center"><span style="font-size:13px">Total contribution: {{$total_f}}</span></td>
          @elseif($f_count == 5)
          <td colspan="5" style="text-align: center"><span style="font-size:13px">Total contribution: {{$total_f}}</span> </td>
          @else
          
          @endif
          
          <td colspan="2" style="text-align: end">Total</td>
          <td style="text-align: center">{{$total_ded}}</td>
         
        </tr>

      </table>
    </div>
  </div>
{{-- 
<div class="container">
  <div class="checkTable" style="margin: 2rem 0 2rem 0">
   
    <div class="check-header">
      <div class="row">
        <div class="col text-center" style="border-right: 1px solid rgba(128, 128, 128, 0.404)">
          <h3>Deductions</h3>
        </div>
        <div class="col text-center">
          <h3>Allowances</h3>
        </div>
      </div>
    </div>

    <div class="check-body">
      <div class="row">
        <div class="col" style="border-right: 1px solid rgba(128, 128, 128, 0.404);">
          <button href="#" type="button" class="float-right" onclick="addDeduc()"
            style="margin-right:1rem;">ADD</button> <br>
          <div class="deducName" style="margin-top: 1rem">
            <table id="deducAllowance" style="">

              @foreach ($fixed_deduc as $item)
              <tr style="border:0">
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



        </div> --}}
   



        <div class="container">
          <h4 class="position-label">Other Information</h4>
          {{-- <button id="positionBtn" class="material-symbols-outlined">
            library_add<span>Add</span></button> --}}
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
              <button href="#" type="button" class="btn-blue" onclick="addAllowance()"
                    style="margin:0.6rem;">ADD
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
                  <button href="#" type="button" class="btn-blue" onclick="addDeduc()"
                    style="margin:0.6rem;">Add Deduction
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
                                    <button id="updBtn{{$item->id}}"  type="submit" disabled><span class="material-symbols-outlined">save</span></button>
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
            </div>  {{-- End container 2 --}}
          
            {{-- <div id="cont3" class="w3-container w3-border city" style="display:none">
              <h2>Tokyo</h2>
              <p>Tokyo is the capital of Japan.</p>
            </div> --}}
           
      
      
      
      
      
      
      
      
      
      
      
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