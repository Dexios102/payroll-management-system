@extends('layout.master')
@section('deduction')
active
@endsection


@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<<<<<<< HEAD
=======
    <title>Document</title>

>>>>>>> 60bc00a92a9b84eb073e445605c2a0c9a18d5a7b
   
  <style>
    
    
table{
  border: 1px solid black;
  width: 100%;
  text-align: center;

}
 thead{
  background-color: #8888885e;
 }

 tr{
  border: 1px solid black;
 }

    
    .grid-container {
    display: grid;
    grid-template-columns: 70% 30%;
    flex-wrap: wrap;
        
  grid-template-rows: 100% 500px;
  gap: 5px;
  padding: 10px;
  /* background-color: aquamarine; */
}

.grid-container > div {
  background-color: rgba(255, 255, 255, 0.8);
  text-align: center;
  padding: 20px 0;
  font-size: 30px;
}

.con2{
    display: ;
}
  </style>
</head>
<body>
    <div class="grid-container">
        <div class="con1">
            <h4>Deduction</h4>
                <table class="table-content">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Type</th>
                   
                </tr>
                </thead>
                <tbody>
                @foreach ($ded as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->code}}</td>
                    <td>{{$item->type}}</td>
                    <td>{{$item->description}}</td>
                </tr>
                @endforeach
                   
                    
                </tbody>
                
                    
                </table>

        </div>
        <div class="con2">
            <form action="/deduction-save" method="POST">
                @csrf
                <input type="text" name="name" id="name" placeholder="Name">

                <input type="text" name="code" id="code" placeholder="Code">
                
                <br><label for="floor">Type</label>
              
                <select name="type" id="type" aria-placeholder="">
                    <option value="Allowance">Allowance</option>
                    <option value="Loan">Loan</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <br><label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10">

                </textarea>

                <button type="submit">Save</button>
            </form>

        </div>
       
         
      </div>

    

</body>
</html>
@endsection