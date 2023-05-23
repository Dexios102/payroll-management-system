@extends('layout.master')
@section('allowance')
active
@endsection
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Allowance Section</title>
  <link rel="stylesheet" href="css/Allowance/allowance-main.css" />
</head>

<body>
  <div class="all-main-container">
    <div class="all-main-header-label">
      Allowance Data
    </div>
    <div class="all-status-windows">
      <ul>
        <li class="all" id="all-btn" onclick="openTable('table-all')">All <span class="count">0</span></li>
        <li class="del" id="archive-button" onclick="openTable('table-archived')">Archived <span class="countArchive">0</span></li>
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
                Print PDF/Printer
              </button>
              <button class="action" id="print-excel" onclick="exportToExcel()">
                <span class="action-icons">
                  <i class="fa-solid fa-table" style="color: #2d9211;"></i>
                </span>
                Spreadsheet
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
                <th>Action</th>
                <th>Code <button class="sort-btn" data-sortby="name"><i class="fa fa-sort"></i></button></th>
                <th>Name <button class="sort-btn" data-sortby="division"><i class="fa fa-sort"></i></button></th>
                <th>Description</th>
                <th>Type <button class="sort-btn" data-sortby="position"><i class="fa fa-sort"></i></button></th>
                <th>Recorded at <button class="sort-btn" data-sortby="position"><i class="fa fa-sort"></i></button></th>
              </tr>
            </thead><!-- ?Thead END -->
            <tbody id="table-body" class="tbody-main">
              @foreach ($all as $item)
              <tr class="primary-table-row">
                <td class="select-checkBox"><input type="checkbox" data-id="{{ $item->id }}"></td>
                <td>ID-00{{$item->id}}</td>
                <td class="table-action-icons">
                  <button>
                    <span class="action-icons"><i class="fa-solid fa-eye eye-main-pos" style="color: #157fd1;"></i></span>
                  </button>
                  <button>
                    <span class="action-icons"><i class="fa-solid fa-pen-to-square" style="color: #6c737f;"></i></span>
                  </button>
                  <button>
                    <span class="action-icons"><i class="fa-sharp fa-solid fa-trash" style="color: #6c737f;"></i></span>
                  </button>
                </td><!-- ?Action Buttons END -->
                <td id="code">{{$item->code}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->type}}</td>
                <td>{{$item->description}}</td>
                <td>
                  <div class="created_at">{{$item->created_at}}</div>
                </td>
              </tr>
              @endforeach
            </tbody><!-- ?Tbody END -->
          </table><!-- ?Table Secction END -->
        </div><!-- !Table Container Wrapper END -->
      </div><!-- !Table Change END -->
    </div><!-- !All Main Container END -->

    <div class="modal" id="addModal">
      <div class="modal-container">
        <div class="modal-header">
          <h2 class="position-label">Allowance</h2>
        </div>
        <div class="modal-form">
          <form action="/allowance-save" method="POST">
            @csrf
            <div class="form-item-modal">
              <span class="material-symbols-outlined modal-icon">
                badge
              </span>
              <input type="text" name="name" id="name" placeholder="Name">
            </div>
            <div class="form-item-modal">
              <span class="material-symbols-outlined modal-icon">
                code_off
              </span>
              <input type="text" name="code" id="code" placeholder="Code">
            </div>
            <br><label for="floor">Type</label>
            <select name="type" id="type" aria-placeholder="">
              <option value="Allowance">Allowance</option>
              <option value="Bonus">Bonus</option>
              <option value="3">3</option>
              <option value="4">4</option>
            </select>
            <br><label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10">
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
          </form>
        </div>
      </div>
    </div>
  </div>

</body>
<script src="js/allowanceFunction/allowance-table.js"></script>
<script src="js/allowanceFunction/allowanceModal.js"></script>
<script src="js/allowanceFunction/allowance-archived.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>
<script src="/path/to/xlsx.full.min.js"></script>
</html>
@endsection