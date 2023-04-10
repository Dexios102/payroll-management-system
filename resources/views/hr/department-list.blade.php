@extends('layout.master')
@section('department')
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
  <link rel="stylesheet" href="css/department.css" />
  <link rel="stylesheet" href="css/updatemodal.css" />
  <link rel="stylesheet" href="css/deletemodal.css" />



<div>
  <div class="container">
    <h4 class="deptLabel">Department Data</h4>
    <button id="deptBtn" class="material-symbols-outlined">
      library_add<span>Add</span></button>
    <div class="table-container">
      <table id="deptTable" class="hover row-border" style="width:100%">
        <thead>
          <tr>
            <th class="id">ID</th>
            <th>Code</th>
            <th>Division</th>
            <th>Floor Number</th>
            <th>Description</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($dp as $item)
          <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->code}}</td>
            <td>{{$item->division}}</td>
            <td>Floor - {{$item->floor}}</td>
            <td>{{$item->description}}</td>
            <td>
              <a href="#" onclick="departmentUpdate({{$item->id}})">Update</a>
              <a href="#" onclick="deletemodal5({{$item->id}})">Delete</a>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div id="deptModal" class="modal">
      <div class="modal-container">
        <div class="modal-header">
          <a href="#" class="close"><span class="material-symbols-outlined exit-icon">
              close
            </span></a>
          <h2 class="modal-label">Add Department</h2>
        </div>
        <div class="modal-form">
          <form action="/department-save" method="POST">
            @csrf
            <div class="form-item-modal">
              <span class="material-symbols-outlined modal-icon">
                overview_key
              </span>
              <input type="text" name="code" id="code" placeholder="Code">
            </div>
            <div class="form-item-modal">
              <span class="material-symbols-outlined modal-icon">
                location_away
              </span>
              <input type="text" name="division" id="division" placeholder="Division">
            </div>
            <label for="floor">Floor Number</label>
            <div class="department-selection">
              <select name="floor" id="floor" aria-placeholder="">
                <option value="1">Floor #1</option>
                <option value="2">Floor #2</option>
                <option value="3">Floor #3</option>
                <option value="4">Floor #4</option>
              </select>
            </div>
            <br>
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="50" rows="5">
                  </textarea>
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
</div>

  {{-- UPDATEMODAL --}}
  <div class="updateModal" id="updateModal">
    <div class="updateModal-container">
      <div class="updateModal-header">
        <a href="#" class="updateclose"><span class="material-symbols-outlined exit-icon">
            close
          </span></a>
        <h2 class="position-label">Update Deduction</h2>
      </div>
      <div class="updateModal-form">
        <form action="/department-update" method="POST">
          @csrf
          <input type="text" name="id2" id="" hidden>
          <div class="form-item-modal">
            <span class="material-symbols-outlined modal-icon">
              overview_key
            </span>
            <input type="text" name="code2" id="code" placeholder="Code">
          </div>
          <div class="form-item-modal">
            <span class="material-symbols-outlined modal-icon">
              location_away
            </span>
            <input type="text" name="division2" id="division2" placeholder="Division">
          </div>
          <label for="floor">Floor Number</label>
          <div class="department-selection">
            <select name="floor2" id="floor" aria-placeholder="">
              <option value="1">Floor #1</option>
              <option value="2">Floor #2</option>
              <option value="3">Floor #3</option>
              <option value="4">Floor #4</option>
            </select>
          </div>
          <br>
          <label for="description">Description</label>
          <textarea name="description2" id="description" cols="50" rows="5">
                </textarea>
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





<div id="deletemodal" class="deletemodal">
  <div class="deletemodal-container">
    <div class="deletemodal-header">
      
      
      <h2 class="deletemodal-label">CONFIRM TO DELETE SELECTED DATA,
        <i style="color: rgb(239, 31, 31)">*All positions that included in this Department will be deleted too!</i>
      </h2>
    </div>
    <div class="deletemodal-form">
      <form action="/department-delete" method="post">
        @csrf
        <input type="text" value="" name="id2" hidden>
        <div class="button-container">
          <button type="submit">Confirm</button>
          <button type="button" class="cancelbtn" onclick="cancelbutton()">Cancel</button>
        </div>
        
      </form>
    </div>
  </div>
</div>




<script src="js/deletemodal.js"></script>
  <script src="js/modaldept.js"></script>
  <script src="js/updatemodal.js"></script>

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