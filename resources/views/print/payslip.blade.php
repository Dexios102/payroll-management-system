<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title> {{$emp->fullname}} Payroll</title>
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
     font-weight: normal;
    }
    .payroll-table th,
    td {
      border: 1px solid rgb(97, 96, 96);
     
      font-size: 13px;
      border-spacing: 0;
      padding: 5px;
    }
    .payroll-table li{
      text-decoration: none;
      /* list-style: none; */
    }

    
  </style>
</head>

<body>


  <div class="container">
    <div class="payroll-container" style="overflow: auto">
      <div class="text-center" style="text-align: center">
        <h4>REPUBLIKA NG PILIPINAS <br> KAGAWARAN NG PAGSASAKA</h4>
       
        <h4 class="container-label" style="font-family: 'Loro', serif">PAYROLL
          <br>For the Period of March 1-31, 2023
        </h4>
        {{-- <a href="/payroll-print/{{Crypt::encrypt($emp->id)}}" class="float-right ">Print</a> --}}
      </div>
      <div class="row" style="">
        <div class="col">
            <p >Entinty Name : BFAR MIMAROPA REGION <br>Fund Cluster: Regular Fund</p>
            
        </div>
        <div class="col">
          <p>Payroll No.: _______________ <br> Sheet 1 of 5 Sheets</p>
         
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

  
</body>



</html>