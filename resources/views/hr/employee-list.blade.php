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
  <!-- !Imports -->
  <link rel="stylesheet" href="css/Employee/employee-main.css" />
</head>

<body>
  <div class="all-main-container">
    <div class="all-main-header-label">
      Employee Data
    </div>
    <div class="all-status-windows">
      <ul>
        <li class="all" id="all-btn" onclick="openTable('table-all')">All <span class="count">0</span></li>
        <li class="del" id="archive-button" onclick="openTable('table-archived')">Archived <span
            class="countArchive">0</span></li>
      </ul>
    </div><!-- ! Status-window close -->
    <div class="all-table-container">
      <div class="table-change active" id="table-all">
        <div class="action-container">
          <div class="action-wrapper">
            <div class="action-buttons">
              <button class="action" id="addBtn">
                <span class="action-icons" id="mark-as-paid">
                  <i class="fa-solid fa-plus" style="color: #358f62;"></i>
                </span>
                Add
              </button>
              <button class="action fullscreen" id="fullscreen-button" onclick="openFullscreen()">
                <span class="action-icons" id="mark-as-unpaid">
                  <i class="fa-solid fa-expand fa-beat-fade" style="color: #0c3d92;"></i>
                </span>
                Expand
              </button>
              <button class="action" id="print-btn">
                <span class="action-icons">
                  <i class="fa-solid fa-print" style="color: #606671;"></i>
                </span>
                Print
              </button>
              <button class="action" id="delete-button" onclick="deleteCheckedItems()">
                <span class="action-icons">
                  <i class="fa-solid fa-trash" style="color: #4b5462;"></i>
                </span>
                Delete
              </button>
            </div>
            <div class="action-search">
              <span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
              <input type="search" placeholder="Search" id="search-input">
            </div>
          </div><!-- !Action Wrapper Close -->
        </div><!-- !Action Container Close -->

        <!-- TODO---------------------------------------------------------------------------------------------------------------- -->

        <div class="table-container-wrapper">
          <table id="table-main">
            <thead class="thead-main">
              <tr>
                <th class="table-selectAll"><input type="checkbox"></th>
                <th>Id <button class="sort-btn" data-sortby="id"><i class="fa fa-sort"></i></button></th>
                <th>Status</th>
                <th>Action</th>
                <th>Name <button class="sort-btn" data-sortby="name"><i class="fa fa-sort"></i></button></th>
                <th>Division <button class="sort-btn" data-sortby="division"><i class="fa fa-sort"></i></button></th>
                <th>Daily Rate</th>
                <th>Position <button class="sort-btn" data-sortby="position"><i class="fa fa-sort"></i></button></th>
                <th>Date Recorded <button class="sort-btn" data-sortby="created_at"><i
                      class="fa fa-sort"></i></button></th>
                <th>More</th>
              </tr>
            </thead><!-- ?Thead END -->
            <tbody id="table-body" class="tbody-main">
              @foreach ($emp as $item)
              <tr class="primary-table-row">
                <td class="select-checkBox"><input type="checkbox" data-id="{{ $item->id }}"></td>
                <td>ID-00{{$item->id}}</td>
                <td>
                  <div class="status">
                    <div class="wrapper-status">{{$item->status}}</div>
                  </div>
                </td>
                <td class="table-action-icons">
                  <button>
                    <span class="action-icons"><i class="fa-solid fa-eye eye-main-pos"
                        style="color: #157fd1;"></i></span>
                  </button>
                  <button>
                    <span class="action-icons"><i class="fa-solid fa-pen-to-square" style="color: #6c737f;"></i></span>
                  </button>
                  <button>
                    <span class="action-icons"><i class="fa-sharp fa-solid fa-trash" style="color: #6c737f;"></i></span>
                  </button>
                </td><!-- ?Action Buttons END -->
                <td id="full_name">{{$item->first_name}} {{$item->middle_name}} {{$item->last_name}}</td>
                <td>{{$item->department}}</td>
                <td>
                  <div class="money">
                    <div class="wrapper-money">{{$item->daily_rate}}</div>
                  </div>
                </td>
                <td>{{$item->position}}</td>
                <td>
                  <div class="created_at">{{$item->created_at}}</div>
                </td>

                <td class="dropdown-td">
                  <button class="dropdown-switch ">
                    <i class="fa-regular fa-circle-chevron-down" style="color: #013a63;"></i></button>
                  <div class="dropdown-content">
              <tr class="extra-info-row" style="display: none;">
                <td colspan="10">
                  <div class="td-flex">
                    <div class="extra">
                      <span>Type: <span class="job_type">{{$item->employee_type}}</span></span>
                      <span>Contact: @if(isset($item->contact))
                        {{$item->contact}}
                        @else
                        <i>No Data</i>
                        @endif</span>
                    </div>
                    <div class="extra">
                      <span>Birthdate: {{$item->birthdate}}</span>
                      <span>Address: {{$item->address}}</span>
                    </div>
                    <div class="extra">
                      <span>Gender: {{$item->gender}}</span>
                      <span>Email: {{$item->email}}</span>
                    </div>
                </td>
              </tr>
        </div>
      </div>
      </td>
      </tr>
      @endforeach
      </tbody><!-- ?Tbody END -->
      </table><!-- ?Table Secction END -->
    </div><!-- !Table Container Wrapper END -->

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

              <!-- !Vertical Line -->
              <div class="vertical-line"></div>

              <div class="dept-info-container">
                <!-- <label for="gender">Gender</label> -->
                <select name="gender" id="gender" aria-placeholder="" style="margin-bottom: -1rem;">
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
                <br>

                <div class="form-item-modal">
                  <span class="material-symbols-outlined modal-icon">
                    cake
                  </span>
                  <input type="date" name="birthdate" id="birthdate">
                </div>

                <label for="department">Division<span class="require"> (required)</span></label>
                <select name="department" id="department" aria-placeholder="">
                  @foreach ($dept as $item)
                  <option value="{{$item->code}}">{{$item->code}}</option>
                  @endforeach
                </select>
                <label for="position">Position<span class="require"> (required)</span></label>
                <select name="position" id="position" aria-placeholder="">
                  <option selected disabled> select position based on Division </option>
                  @foreach ($pos as $item)
                  <option value="{{$item->name}}""> ({{$item->division_info->code}}) {{$item->name}} </option>
                  @endforeach
                </select>
                    <label for=" employee_type">Employee Type<span class="require"> (required)</span></label>
                    <select name="employee_type" id="employee_type">
                      <option value="regular">Regular</option>
                      <option value="casual">Casual</option>
                      <option value="job order">Job-Order</option>
                    </select>
                    <label for="status" >Status<span class="require"> (required)</span></label>
                    <select name="status" id="status" style="margin-bottom: .5rem;">
                      <option value="active">Active</option>
                      <option value="inactive">Inactive</option>
                    </select>
                    <div class="form-item-modal">
                      <span class="material-symbols-outlined modal-icon">
                        trending_up
                      </span>
                      <input type="text" name="daily_rate" id="daily_rate" placeholder="Daily Rate" style="margin-bottom: -.5rem;">
                    </div>

                    <!-- !Modal Buttons -->
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
  <script src="js/employeeFunction/employee-table.js"></script>
  <script src="js/employeeFunction/employeeModal.js"></script>
  <script>
    const dropdownSwitches = document.querySelectorAll(".dropdown-switch");
    dropdownSwitches.forEach((switchBtn) => {
      switchBtn.addEventListener("click", function () {
        const extraInfoRow = switchBtn.closest("tr").nextElementSibling;
        extraInfoRow.style.display = (extraInfoRow.style.display === "none") ? "table-row" : "none";
      });
    });
  </script>
  </div><!-- !Table Change END -->
  </div><!-- !all-table-container END -->
  </div><!-- !ALl Main Container END -->
</body>

</html>
@endsection