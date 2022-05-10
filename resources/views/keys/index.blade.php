
@extends ('layouts.app')

@section ('content')

<h2>Category Configuration Keys</h2>
<br>

<a href="{{ route('keys.create') }}"  class="btn btn-info mr-1" id="createBtn">Create Category Configuration Key</a>

<!-- The Modal -->



<br><br>
<div class="container mt-5 mb-5 justify-content-center">
<table class="table table-striped  justify-content-center">
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
    <tr id="kid{{$key}}">
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
<a class="btn btn-danger" href="javascript:void(0)" onClick="deleteKey('{{$key}}','{{$key->id}}')">Delete</a>


<i class="bi bi-trash3-fill"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
</svg></i>







      <!-- error modal -->

      <div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Warning</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>lalalalllalalalalla</p>
      </div>

    </div>
  </div>
</div>

<!-- end error modal -->

    </div>

</td>
@include('keys.delete')
    </tr>
@endforeach
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function deleteKey(key,id){

        if(confirm("Do you want to delete this"+id))
        {
            console.log("hello");
            $.ajax({
                url:'keys/'+id,
                type:'DELETE',
                data:{
                    _token:$("input[name=_token]").val()
                },
                success:function(response){
                    $("#kid"+key).remove();
                }
            });
        }

    }
</script>


  </tbody>
</table>
    </div>


@endsection
