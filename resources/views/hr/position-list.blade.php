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
    

    <h4>Position List</h4>
    <table>
        <tr>
            <th>Name</th>
            <th>Division</th>
            <th>Description</th>
            
        </tr>
        @foreach ($pos as $item)
        <tr>
          <td>{{$item->name}}</td>
          <td>{{$item->division_info->code}}</td>
          <td>{{$item->description}}</td>
      </tr>
        @endforeach
        
       
        
    </table>

    <button id="posBtn">Add Position</button>

    <!-- The Modal -->
        <div id="posModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
            <span class="close">&times;</span>
            <form action="/position-save" method="POST">
                @csrf
               
                
                <label for="division">Division</label>
                <select name="division" id="division" aria-placeholder="">
                  @foreach ($dept as $item)
                  <option value="{{$item->id}}">{{$item->code}}</option>
                  @endforeach
                </select>
                <input type="text" name="name" id="name" placeholder="name">

                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10">

                </textarea>

                <button type="submit">Save</button>
            </form>
            </div>
        
        </div>
</body>



<script>
    var modal = document.getElementById("posModal");
    var btn = document.getElementById("posBtn");
    

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
</html>

@endsection