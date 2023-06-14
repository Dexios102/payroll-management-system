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
  <link
    href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500&family=Fira+Sans:wght@200;300;400&family=Nunito&display=swap"
    rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/css/custom.css">
  <link rel="stylesheet" href="/css/checkModal.css">
  <link rel="stylesheet" href="/css/Re-usable/Table-Main-Functions/all-main-container.css">
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
</body>



</html>
@endsection