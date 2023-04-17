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

  <link rel="stylesheet" href="/css/custom.css">
  <style>
    table {
      border-spacing: 0;
    }

    .payroll-table th,
    td {
      border: 1px solid black;
      max-width: 100%;
      white-space: nowrap;
      border-spacing: 0;
      padding: 3px;
    }

    
  </style>
</head>

<body>


  <div class="container">
    <div class="payroll-container" style="overflow: auto">
      <div class="text-center">
        <h4 class="container-label">PAYROLL</h4>
        <p>For the Period of March 1-31, 2023</p>
        {{-- <a href="/payroll-print/{{Crypt::encrypt($emp->id)}}" class="float-right ">Print</a> --}}
      </div>
      <table style="width:100%; border:1px solid black" class="payroll-table">
        <tr>
          <th rowspan="4" colspan="2" style="text-align: center; width:fit-content">NAME OF EMPLOYEE</th>
          <th rowspan="4" style="text-align: center">MONTHLY SALARY</th>
          <th rowspan="4" style="text-align: center">PERA</th>
          <th colspan="7" rowspan="2" style="text-align: center">Deductions</th>
          <th rowspan="4" style="text-align: center">NET</th>

        </tr>
        <tr>

        </tr>
        <tr>
          <td rowspan="2" style="text-align: center">GSIS share</td>
          <td rowspan="2" style="text-align: center">Mediacare</td>
          <td rowspan="2" style="text-align: center">Pag-big</td>
          <td rowspan="2" style="text-align: center">Withholding Tax</td>
          <td rowspan="1" colspan="3" style="text-align: center">OTHER</td>
        </tr>
        <tr>
          <td style="text-align: center">Code</td>
          <td style="text-align: center">Description</td>
          <td style="text-align: center">Amount</td>
        </tr>
        <tr>
          <td colspan="2">
            <div class="d-block p-3">
              <i>{{$emp->id}}. {{$emp->first_name}} {{$emp->middle_name}} {{$emp->last_name}}</i><br>
              <i>Employee No: {{$emp->employee_no}}</i><br>
              <i>Position: {{$emp->position}}</i><br>
              <i>Designation: {{$emp->department}}</i>

            </div>
          </td>


          <td class="text-center">{{$emp->monthly_rate}}.00</td>
          <td style="text-align: center">2000.00</td>
          <td style="text-align: center">299<br><i>(9% of Basic salary)</i></td>
          <td style="text-align: center">5</td>
          <td style="text-align: center">100.00</td>
          <td style="text-align: center">7</td>
          <td style="text-align: center">8</td>
          <td style="text-align: center">9</td>
          <td style="text-align: center">10</td>
          <td style="text-align: center">27000</td>

        </tr>

      </table>
    </div>
  </div>

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