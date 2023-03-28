@extends('layout.master')
@section('position')
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
  <link rel="stylesheet" href="css/position.css" />
</head>

<body>
  <div class="container">
    <h4 class="position-label">Position Data</h4>
    <button id="positionBtn" class="material-symbols-outlined">
      library_add<span>Add</span></button>
    <div class="table-container">
      <table id="positionTable" class="hover row-border" style="width:100%">
        <thead>
          <tr>
            <th>Name</th>
            <th>Division</th>
            <th>Description</th>
          </tr>
        </thead>
          @foreach ($pos as $item)
          <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->division_info->code}}</td>
            <td>{{$item->description}}</td>
          </tr>
          @endforeach
          </tbody>
      </table>
    </div>

    <div id="posModal" class="modal">
      <div class="modal-container">
        <div class="modal-header">
          <a href="/position" class="href"><span class="material-symbols-outlined exit-icon">
            close
          </span></a>
          <h2 class="position-label">Add Position</h2>
        </div>
        <div class="modal-form">
          <form action = "/position-save" method="POST">
            @csrf
            <label for="division">Division</label>
          <select name="division" id="division" aria-placeholder="">
            @foreach ($dept as $item)
            <option value="{{$item->id}}">{{$item->code}}</option>
            @endforeach
          </select>
          <div class="form-item-modal">
            <span class="material-symbols-outlined modal-icon">
              badge
            </span>
            <input type="text" name="name" id="name" placeholder="Name">
          </div>
          <label for="description">Description</label>
          <textarea name="description" id="description" cols="30" rows="10"></textarea>
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
          </form>
        </div>
      </div>
    </div>
</body>
<script src="js/positionModal.js"></script>
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