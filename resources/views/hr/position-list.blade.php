<!-- !Layouts -->
@extends('layout.master')
@section('position')
active
@endsection
@section('content')
<!-- !Layouts Close -->

<!-- !Html -->
<!DOCTYPE html>
<html lang="en">

<!-- !Head -->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Position Section</title>
  <!-- !CSS Links -->
  <link rel="stylesheet" href="css/Position/position-main.css" />
</head><!-- !Head Close -->

<!-- !Body Open -->
<body>
  <div class="position-main-content">
    <h4 class="position-header-label">Position Data</h4>
      <div class="position-status-windows">
        <ul>
          <li class="all" id="all-btn" onclick="openTable('table-all')">All <span class="count">0</span></li>
          <li class="del" id="archive-button" onclick="openTable('table-archived')">Archived <span class="countArchive">0</span></li>
        </ul>
      </div><!-- ! status-window close -->
      <div class="position-table-container">
        <div class="table-change active" id="table-all">

          <div class="action-container">
            <div class="action-wrapper">
              <div class="action-buttons">
                <button class="action" id="positionBtn">
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

          <div class="table-container-wrapper">
            <table id="table-main">
              <thead class="thead-main">
                <tr>
                  <th class="table-selectAll"><input type="checkbox"></th>
                  <th>Id <button class="sort-btn" data-sortby="id"><i class="fa fa-sort"></i></button></th>
                  <th>Name <button class="sort-btn" data-sortby="name"><i class="fa fa-sort"></i></button></th>
                  <th>Division <button class="sort-btn" data-sortby="division"><i class="fa fa-sort"></i></button></th>
                  <th>Description <button class="sort-btn" data-sortby="description"><i class="fa fa-sort"></i></button>
                  </th>
                  <th class="table-action">Action</th>
                </tr>
              </thead><!-- !Thead END -->
              <tbody id="table-body" class="tbody-main">
                @foreach ($pos as $item)
                <tr>
                  <td class="select-checkBox"><input type="checkbox" data-id="{{ $item->id }}"></td>
                  <td>{{$item->id}}</td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->division_info->code}}</td>
                  <td>{{$item->description}}</td>
                  <span id="test"></span>
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
                  </td>
                </tr>
                @endforeach
              </tbody><!-- !Tbody END -->
            </table><!-- !Table END -->
          </div><!-- !table-container-wrapper END -->
        </div><!-- ! Table Change END -->

            <div class="table-change" id="table-archived">

              <div class="action-container">
                <div class="action-wrapper">
                  <div class="action-buttons">
                    <button class="action" id="positionBtn" style="background: #6c757d; cursor: not-allowed; color: #fff">
                      <span class="action-icons" id="mark-as-paid">
                        <i class="fa-solid fa-plus" style="color: #fdfffe;"></i>
                      </span>
                      Add
                    </button>
                    <button class="action fullscreen" id="fullscreen-button" onclick="openFullscreen()">
                      <span class="action-icons" id="mark-as-unpaid">
                        <i class="fa-solid fa-expand fa-beat-fade" style="color: #0c3d92;"></i>
                      </span>
                      Expand
                    </button>
                    <button class="action" id="print-btn2">
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
                    <input type="search" placeholder="Search" id="search-input2">
                  </div>
                </div><!-- !Action Wrapper Close -->
              </div><!-- !Action Container Close -->
              <div class="table-container-wrapper">
                <table id="table-second">
                  <thead class="thead_second">
                    <tr>
                      <th class="table-selectAll"><input type="checkbox"></th>
                      <th>Id <button class="sort-btn_archived" data-sortby="id"><i class="fa fa-sort"></i></button></th>
                      <th>Name <button class="sort-btn_archived" data-sortby="name"><i class="fa fa-sort"></i></button></th>
                      <th>Division <button class="sort-btn_archived" data-sortby="division"><i class="fa fa-sort"></i></button>
                      </th>
                      <th>Description <button class="sort-btn_archived" data-sortby="description"><i
                            class="fa fa-sort"></i></button></th>
                      <th>Date_Deleted <button class="sort-btn_archived" data-sortby="date_deleted"><i
                            class="fa fa-sort"></i></button></th>
                      <th class="table-action">Action</th>
                    </tr>
                  </thead>
                  <tbody id="table-body table-archived-body" class="tbody_second">
                    @foreach ($posdeleted as $item)
                    <tr id="table2-tr">
                      <td class="select-checkBox"><input type="checkbox" data-id="{{ $item->id }}"></td>
                      <td>{{$item->id}}</td>
                      <td>{{$item->name}}</td>
                      <td>{{$item->division_info->code}}</td>
                      <td>{{$item->description}}</td>
                      <td>{{$item->deleted_at}}</td>
                      <span id="test"></span>
                      <td class="table-action-icons">
                        <button>
                          <span class="action-icons"><i class="fa-solid fa-eye view_pos_archived" style="color: #157fd1;"></i></span>
                        </button>
                        <button>
                          <span class="action-icons"><i class="fa-solid fa-trash-can-arrow-up"
                              style="color: #2d6a4f;"></i></i></span>
                        </button>
                        <button>
                          <span class="action-icons"><i class="fa-sharp fa-solid fa-trash" style="color: #6c737f;"></i></span>
                        </button>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div><!-- ! Table Container Wrapper END -->
            </div><!-- ! Table Change END -->
      </div><!-- ! Position-table-container END -->
  </div><!-- ! main-content END -->
  <!-- ?Add Modal -->
  <div id="posModal" class="modal">
    <div class="modal-container">
      <div class="modal-header">
        <h2 class="position-label">Add Position</h2>
      </div>
      <div class="modal-form">
        <form action="/position-save" method="POST">
          @csrf
          <label for="division">Division<span style="color:red;">*</span></label>
          <select name="division" id="division" aria-placeholder="">
            @foreach ($dept as $item)
            <option value="{{$item->id}}">{{$item->code}}</option>
            @endforeach
          </select>
          <div class="form-item-modal">
            <span class="material-symbols-outlined modal-icon">
              badge
            </span>
            <label for="name">Name<span style="color:red;">*</span></label>
            <input type="text" name="name" id="name" placeholder="Name">
          </div>
          <label for="description">Description<span style="color:red;">*</span></label>
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
</div><!-- !Modal END -->
</body><!-- !Body END -->
<!-- JavaScript Imports -->
<script src="js/positionFunction/position-table.js"></script>
<script src="js/positionFunction/positionModal.js"></script>
<script src="js/positionFunction/position-archive-table.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Delete Function -->
<script>
  function deleteCheckedItems() {
    const checkboxes = $('#table-main tbody input[type="checkbox"]:checked');
    checkboxes.each(function () {
      const checkbox = $(this);
      const itemId = checkbox.data('id');
      $.ajax({
        type: 'POST',
        url: '/position-delete/' + itemId,
        data: {
          _token: '{{ csrf_token() }}',
          deleted_at: new Date().toISOString(),
          postid: itemId,
        },
        success: function (data) {
          console.log('Database updated successfully');
        },
        error: function (data) {
          console.log('Error updating database');
        }
      });
    });
  }
</script>
<!-- Animation -->
<script>
  $(document).ready(function () {
    $('#delete-button').click(function () {
      var checkedBoxes = $('#table-main tbody input[type="checkbox"]:checked');
      checkedBoxes.each(function () {
        var row = $(this).closest('tr');
        row.addClass('fade-out');
        setTimeout(function () {
          row.remove();
        }, 500);
      });
    });
  });
</script>
</html><!-- !Html  -->
@endsection
