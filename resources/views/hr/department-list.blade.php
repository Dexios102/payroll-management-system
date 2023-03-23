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
    <title></title>
    {{-- @vite('resources/css/app.css') --}}
    <style>
        table, th, td {
  border:1px solid black;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 50%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}



    </style>
</head>
<body>
  

    <h4>Department List</h4>
    <table>
        <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Division</th>
            <th>Floor Number</th>
            <th>Description</th>
        </tr>
        @foreach ($dp as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->code}}</td>
            <td>{{$item->division}}</td>
            <td>{{$item->floor}}</td>
            <td>{{$item->description}}</td>
        </tr>
        @endforeach
        
    </table>

    <button id="deptBtn">Add department</button>

    <!-- The Modal -->
        <div id="deptModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
            <span class="close">&times;</span>
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
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10">

                </textarea>

                <button type="submit">Save</button>
            </form>
            </div>
        
        </div>












        <script>
            var modal = document.getElementById("deptModal");
            var btn = document.getElementById("deptBtn");
            

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];
            
            // When the user clicks the button, open the modal 
            btn.onclick = function() {
              modal.style.display = "block";
            }
            
            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
              modal.style.display = "none";
            }
            
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
              if (event.target == modal) {
                modal.style.display = "none";
              }
            }
            </script>



</body>
</html>


@endsection