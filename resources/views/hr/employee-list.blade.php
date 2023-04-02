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
  <link rel="stylesheet" href="css/checkModal.css">

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
              {{-- <div onclick=myHandler() id="{{$item->id}}">&rarr; Click Here! &larr;</div> --}}
              <div class="check-container" ">
                <button title="Information" onclick="checkInfo({{$item->id}})" >
                    <span class="material-symbols-outlined check-icon">
                      menu_open
                    </span></button>
              </div>
            </td>
            <td>
              <div class="action-icons">
                <button><a href="#" title="Update"><span class="material-symbols-outlined icons">
                      update
                    </span></a></button>
                <button class="delete"><a href="#" title="Archive"></a><span class="material-symbols-outlined icons">
                    archive
                  </span></button>
              </div>
            </td>
            <td id="full_name">{{$item->first_name}} {{$item->middle_name}} {{$item->last_name}}</td>
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
          <h2 class="modal-label">Add Employee</h2>
        </div>
        <div class="modal-form">
          <form action="/employee-save" method="POST">
            @csrf
            <div class="wrapper">
              <div class="basic-info-container">
                <div class="form-item-modal">
                  <span class="material-symbols-outlined modal-icon">
                    badge
                  </span>
                  <input type="text" name="f_name" id="f_name" placeholder="First Name">
                </div>
                <div class="form-item-modal">
                  <span class="material-symbols-outlined modal-icon">
                    supervised_user_circle
                  </span>
                  <input type="text" name="m_name" id="f_name" placeholder="Middle Name">
                </div>
                <div class="form-item-modal">
                  <span class="material-symbols-outlined modal-icon">
                    signature
                  </span>
                  <input type="text" name="l_name" id="f_name" placeholder="Last Name">
                </div>
                <div class="form-item-modal">
                  <span class="material-symbols-outlined modal-icon">
                    phone_in_talk
                  </span>
                  <input type="text" name="contact" id="contact" placeholder="Phone(optional)">
                </div>
                <div class="form-item-modal">
                  <span class="material-symbols-outlined modal-icon">
                    mail
                  </span>
                  <input type="text" name="email" id="email" placeholder="Email">
                </div>
                <div class="form-item-modal">
                  <span class="material-symbols-outlined modal-icon">
                    supervisor_account
                  </span>
                  <input type="text" name="suffix" id="suffix" placeholder="Suffix(optional)">
                </div>
                <div class="form-item-modal">
                  <span class="material-symbols-outlined modal-icon">
                    person_pin
                  </span>
                  <input type="text" name="birthplace" placeholder="Birthplace">
                </div>
                <div class="form-item-modal">
                  <span class="material-symbols-outlined modal-icon">
                    pin_drop
                  </span>
                  <input type="text" name="address" placeholder="Address">
                </div>
              </div>
              <div class="vertical-line"></div>
              <div class="dept-info-container">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" aria-placeholder="">
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
                <br>

                <div class="form-item-modal">
                  <!-- <label for=" birthdate">Birthdate</label> -->
                  <!-- <br> -->
                  <span class="material-symbols-outlined modal-icon">
                    calendar_month
                  </span>
                  <input type="date" name="birthdate" id="birthdate">
                </div>

                <label for="department">Division<span class="require">*</span></label>
                <select name="department" id="department" aria-placeholder="">
                  @foreach ($dept as $item)
                  <option value="{{$item->code}}">{{$item->code}}</option>
                  @endforeach
                </select>
                <label for="position">Position<span class="require">*</span></label>
                <select name="position" id="position" aria-placeholder="">
                  <option selected disabled> select position based on Division </option>
                  @foreach ($pos as $item)
                  <option value="{{$item->name}}""> ({{$item->division_info->code}}) {{$item->name}} </option>
              @endforeach
            </select>
                <label for=" employee_type">Employee Type<span class="require">*</span></label>
                    <select name="employee_type" id="employee_type">
                      <option value="regular">Regular</option>
                      <option value="casual">Casual</option>
                      <option value="job order">Job-Order</option>
                    </select>
                    <label for="status">Status<span class="require">*</span></label>
                    <select name="status" id="status">
                      <option value="active">Active</option>
                      <option value="inactive">Inactive</option>
                    </select>
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
              </div>
          </form>
        </div>
      </div>
      </div>
      </div>

      <!-- {{-- checkModal --}} -->
      <div class="modal-check" id="checkModal">
        <div class="check-modal-container">
          <div class="check-modal-headear">
            <span style="float:right" class="close2">
              <a href="#" style="font-size: 1.5rem; padding:2px;">X</a>
              </span>
              <h1 id="fullnameemployee"></h1>
              <h4 class="check-modal-label">
                Allowance and Deduction Details
              </h4>
              <p id="try"></p>
          </div>

          <div class="check-modal-body" style="display: flex">
              <div class="deduct-container" style="width: 100%; min-height: 20rem; background-color:rgba(0, 255, 255, 0.033); padding:1.5rem">
                <h4 style="text-align: center">Deduction</h4>
                <h5>Share</h5>
                <p id="deduct_list"></p>
                <form action="" method="post">
                  <ul style="margin-left: 3rem;">
                    <li>GSIS
                      <input type="text" name="" id="input1" class="input1" disabled value="2500"> 
                      <button type="button" class="btninput1" onclick="btninput1()">
                        Edit
                      </button>
                    </li>

                    <li>Medicare
                      <input type="text" name="" id="input2" class="input2" disabled value="100">
                      <button type="button" class="btninput2" onclick="btninput2()">
                        Edit
                      </button>
                    </li>

                    <li>PAGIBIG
                      <input type="text" name="" id="input3" class="input3" disabled value="500">
                      <button type="button" class="btninput3" onclick="btninput3()">
                        Edit
                      </button> 
                    </li>

                    <li>WithHolding Tax
                      <input type="text" name="" id="input4" class="input4" disabled value="500">
                      <button type="button" class="btninput4" onclick="btninput4()">
                        Edit
                      </button>
                     </li>
                  </ul>
                </form>

                <h5>Personal Loan</h5>
                <form action=""  method="POST">
                  <ul style="margin-left: 3rem;">
                    @foreach ($emp_deduc as $item)
                    <li>{{$item->deduction_info->name}}<input type="text" name="" id="" disabled value="{{$item->total_amount}} - {{$item->interest}}%"></li>
                    @endforeach
                 
                  </ul>
                </form>
                <hr style="margin: 1rem 0 1rem 0">

                {{-- AddDeduction --}}
                <form class="btn-submit" action="add/deduc" method="post">
                  @csrf
                  <label for=""></label>
                  <input type="text" name="input_employee_id" id="employee_id" readonly>
                  <select name="deduction_id" id="deduction_id">
                    @foreach ($ded as $item)
                    <option value={{$item->id}}>{{$item->name}}</option>
                    @endforeach 
                  </select>
                  <input type="number" name="total_loan" id="total_loan" placeholder="Total amount">
                  <input type="number" name="interest" id="interest" placeholder="Monthly interest">

                  <button class="form-submit2" onclick="addDeduction()">Add Deduction</button>
                </form>
              </div>
              {{-- <div class="bonus-container" style="width: 50%; min-height: 20rem; background-color:rgba(5, 200, 47, 0.087);padding:1.5rem">
                <h4>Allowance/Bonus</h4>

              </div> --}}
          </div>
        </div>
      </div>
  </div>
      <!-- {{-- checkModal --}}
      <div class="modalcheck">
        <div class="checkmodal-container">
          <div class="checkmodal-header">
            <span style="float:right" class="close2">
               <a href="#" style="font-size: 1.5rem; padding:2px;">X</a>
               </span>
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
      </div> -->
    <script src="js/modal.js"></script>
    <script src="js/formModal.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
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

    {{-- <script>
       $('.form-submit2').click(function(){
        var a = document.getElementById('employee_id').value;
        var b = document.getElementById('deduction_id').value;
        var c = document.getElementById('total_loan').value;
        var d = document.getElementById('interest').value;
          $.ajax({
              url: "add/deduc", 
              method: "POST",
              cache:false,
              data:{
                emp:a,
                deduc:b,
                total:c,
                interest:d
               },
              success:function(success){
              alert(success);
              }
          });
          });
    </script> --}}
</body>

</html>
@endsection