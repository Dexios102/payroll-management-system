@extends('layout.master')
@section('employee')
active
@endsection
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Department Section</title>
  <link rel="stylesheet" href="css/employee.css" />
  <link rel="stylesheet" href="css/modal.css" />

<body>
  <div class="container">
    <h4 class="employeeLabel">Employee Records</h4>
    <button id="addBtn" class="material-symbols-outlined">
      Add<span>Add</span></button>
    <div class="table-container">
      <table id="deptTable" class="hover row-border" style="width:100%">
        <thead>
          <tr>
            <th>Check</th>
            <th>Action</th>
            <th>Name</th>
            <th>Status</th>
            <th>Division</th>
            <th>Position</th>
            <th>Employee Type</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Gender</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($emp as $item)
          <tr>
            <td>
              <div class="check-container">
                <button><a href="#" id="checkBtn">
                  <span class="material-symbols-outlined check-icon">
                    menu_open
                    </span></a></button>
              </div>
            </td>
              <td>
                <div class="action-icons">
                  <button><a href="#"><span class="material-symbols-outlined icons">
                    update
                    </span></a></button>
                  <button class="delete"><a href="#"></a><span class="material-symbols-outlined icons">
                    archive
                    </span></button>
                </div>
            </td>
            <td>{{$item->first_name}} {{$item->middle_name}} {{$item->last_name}}</td>
            <td>{{$item->status}}</td>
            <td>{{$item->department}}</td>
            <td>{{$item->position}}</td>
            <td>{{$item->employee_type}}</td>
            <td>
              @if(isset($item->contact))
              {{$item->contact}}
              @else
              <i>No Data</i>
              @endif
            </td>
            <td>{{$item->email}}</td>
            <td>{{$item->gender}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div id="addModal" class="modal">
      <div class="modal-container">
        <div class="modal-header">
          <span class="close" href="#" style="font-size: 3rem">&times;</span>
          <h2>Add Employee</h2>
        </div>
        <form action="/employee-save" method="POST">
          @csrf
          <input type="text" name="f_name" id="f_name" placeholder="First Name">
          <input type="text" name="m_name" id="f_name" placeholder="Middle Name">
          <input type="text" name="l_name" id="f_name" placeholder="Last Name">
          <input type="text" name="suffix" id="suffix" placeholder="Suffix(optional)">
          <input type="text" name="contact" id="contact" placeholder="contact number(optional)">
          <input type="text" name="email" id="email" placeholder="Email">
          <label for="gender">Gender</label>
          <select name="gender" id="gender" aria-placeholder="">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
          <br>
          <label for="department">Division</label>
          <select name="department" id="department" aria-placeholder="">
            @foreach ($dept as $item)
            <option value="{{$item->code}}">{{$item->code}}</option>
            @endforeach
          </select>
          <label for="position">Position</label>
          <select name="position" id="position" aria-placeholder="">
            <option selected disabled> select position based on Division </option>
            @foreach ($pos as $item)
            <option value="{{$item->name}}""> ({{$item->division_info->code}}) {{$item->name}} </option>
            @endforeach
          </select>
          <label for=" birthdate">Birthdate</label>
              <input type="date" name="birthdate" id="birthdate">
              <br>
              <input type="text" name="birthplace" placeholder="Birthplace">
              <input type="text" name="address" placeholder="Address">
              <br>
              <label for="employee_type">Employee Type</label>
              <select name="employee_type" id="employee_type">
                <option value="regular">Regular</option>
                <option value="casual">Casual</option>
                <option value="job order">Job-Order</option>
              </select>
              <label for="status">Status</label>
              <select name="status" id="status">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
              </select>
              <br>
              <button type="submit">Save</button>
        </form>
      </div>
    </div>
  </div>
  {{-- checkModal --}}
  <div id="checkModal" class="modal">
    <div class="checkmodal-container">
      <div class="checkmodal-header">
        <span style="float:right" class="close2"> <a href="#" style="font-size: 1.5rem; padding:2px;">X</a> </span>
        <h4>Allowance and Deduction Details</h4>
      </div>
      <div class="checkmodal-body">
        <div class="listcon">
          <div class="listheader">
            <h6>Allowances</h6>
          </div>
        </div>
        <div class="listcon">
          <div class="listheader">
            <h6>Deductions</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script src="js/checkModal.js"></script>
  <script src="js/modal.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <!--  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bulma.min.js"></script> -->
  <script>
    $(document).ready(function () {
      $('#deptTable tbody').on('click', 'tr', function () {
        $(this).toggleClass('selected');
      });
      $('#deptTable').DataTable({
        scrollY: '45vh',
        scrollCollapse: true,
        scrollX: 'auto',
        paging: true,
      });
    });
  </script>
</body>

</html>
@endsection