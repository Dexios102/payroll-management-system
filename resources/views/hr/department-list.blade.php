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

<body>
  <div class="container">
    <h4 class="deptLabel">Department List</h4>
    <button id="deptBtn" class="material-symbols-outlined">
      Add<span>Add department</span></button>
    <div class="table-container">
      <table id="deptTable" class="hover row-border" style="width:100%">
        <thead>
          <tr>
            <th class="id">ID</th>
            <th>Code</th>
            <th>Division</th>
            <th>Floor Number</th>
            <th>Description</th>
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
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div id="deptModal" class="modal">
      <div class="modal-container">
        <div class="modal-header">
          <!-- <span>&times;</span> -->
          <h2>Add Department</h2>
        </div>
        <form action="/department-save" method="POST">
          @csrf
          <input type="text" name="code" id="code" placeholder="Code">
          <input type="text" name="division" id="division" placeholder="Division">
          <label for="floor">Floor Number</label>
          <select name="floor" id="floor" aria-placeholder="">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>
          <br>
          <label for="description">Description</label>
          <textarea name="description" id="description" cols="50" rows="5">

                </textarea>
          <button type="submit">Save</button>
        </form>
      </div>
    </div>
  </div>
  <script src="js/departmentList.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <!--  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bulma.min.js"></script> -->
  <script>
    $(document).ready(function () {
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