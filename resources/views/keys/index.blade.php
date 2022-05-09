
@extends ('layouts.app')

@section ('content')
<style>
      body {
        height: 100%;
        margin: 0;
        padding: 0;
        font-family: Arial, Helvetica, sans-serif;
      }
      h2 {
        font-size: 20px;
        color: #000000;
      }
      #example {
        visibility: hidden;
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        text-align: center;
        z-index: 1000;
      }
      #example div {
        width: 350px;
        height: 80px;
        margin: 100px auto;
        background-color: #f2f2f2;
        border-radius: 10px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        border: 1px solid #666666;
        padding: 15px;
        text-align: center;
        font-weight: bold;
        font-size: 15px;
        border: 3px solid #cccccc;
        position: absolute;
        left: 50%;
        top: 100px;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
      }
    </style>
<h2>Category Configuration Keys</h2>
<br>
<a href="{{ route('keys.create') }}"  class="btn btn-info" id="createBtn">Create Category Configuration Key</a>
<!-- The Modal -->



<br><br>
<h2>hellooooo</h2>
<table class="table table-striped ">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Extra</th>
      <th scope="col">Edit/Delete</th>
    </tr>
  </thead>
  <tbody>
  @foreach($keys as $key)
    <tr>
      <th scope="row">{{$key->id}}</th>
      <td>{{$key->name}}</td>
      <td>{{$key->extra}}</td>
      <td>
          <a href="{{route('keys.edit'
,['key'=>$key->id])}}" ><i class="bi bi-pencil-square" ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="orange" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="#" onclick='example()'>
<i class="bi bi-trash3-fill"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
</svg></i></a>
<div id="example">
      <div>
        <p>Are you sure you want to delete this key?</p>

        <a href="{{route('keys.index')}}" class="btn btn-secondary">Cancel</a>
        <a href="{{route('keys.destroy'
,['key'=>$key->id])}}" class="btn btn-danger">Delete</a>
        <a href='#' onclick='example()'>Click here to close the box</a>
      </div>
      <script>
        function example() {
          el = document.getElementById("example");
          el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
        }
      </script>
    </div>

</td>
    </tr>
    @endforeach


  </tbody>
</table>



@endsection
