
@extends ('layouts.app')

@section ('content')
@if(isset($deleteError))
<div class="alert alert-danger">
  <strong>{{$deleteError}}</strong>
</div>

    @endif
    @if(session('created'))
    <div class="alert alert-success">
        {{session('created')}}
</div>
    @endif
    @if(session('edited'))
    <div class="alert alert-success">
        {{session('edited')}}
</div>
    @endif

    @if(session('deleted'))
    <div class="alert alert-success">
        {{session('deleted')}}
</div>
    @endif
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


    <h1 style="text-align:center">Category Configuration Keys</h1>


<br>
 <!-- search form -->
 <form style="margin-left: 42%;"method="get" action="{{ route('keys.index') }}">
<input  type="text" name="name"  value="{{Request::get('name')}}" placeholder="Search by name">
<button type="submit" class="btn btn-primary" name="search" >Search</button>
</form>
<!--
end search form -->
<br>


<a  href="{{ route('keys.create') }}"  class="btn btn-info " style="width:300px;margin-left:120px;" id="createBtn">Create Category Configuration Key</a>


<br><br>
<div class="container mt-5 mb-5 justify-content-center">
<table class="table table-striped  justify-content-center">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Extra</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>


  @foreach($keys as $key)

    <tr id="kid{{$key->id}}">
      <th scope="row">{{$key->id}}</th>
      <td>{{$key->name}}</td>
      <td>
     {{ $key->extra}}

     </td>
      <td>
          <a href="{{route('keys.edit'
,['key'=>$key->id])}}" ><i class="bi bi-pencil-square" ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="orange" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
          </td>
<td>


<a   onClick="deleteKey('{{$key->id}}')"><i class="bi bi-trash3-fill"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
</svg></i></a>
          </td>
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$key->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" >Delete Category Configuration Key</h5>
        <a href="{{route('keys.index')}}"><button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></a>
      </div>
      <div>
      <div class="modal-body" >
        Are you sure you want to delete this category configuration key?
        <form id="deleteKey" method="post" action="{{route('keys.destroy')}}">
            @method('delete')
            @csrf
            <input type="hidden" id="id" name="id" value="{{$key->id}}">

      </div>
      <div class="modal-footer">
        <a href="{{route('keys.index')}}" class="btn btn-secondary" data-dismiss="modal" >Cancel</a>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
          </form>
          </div>
    </div>
  </div>
</div>
<!-- end Modal -->
      </div>

    </div>
  </div>
</div>



    </div>

</td>

    </tr>
@endforeach

<script>

function deleteKey(id){

        $("#exampleModal"+id).modal('toggle');
    }


</script>


  </tbody>
</table>
    </div>


@endsection
