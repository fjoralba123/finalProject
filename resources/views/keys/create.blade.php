@extends ('layouts.app')

@section('content')
<form method="post" action="{{ route('keys.store') }}">
        @csrf
<div class="container mt-5 mb-5 justify-content-center">
    <div class="card px-1 py-4">

        <div class="card-body">
            <h4 class="card-title mb-3">Create New Category Configuration Key</h4>




            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <!-- <label for="name">Name</label> -->
                        <label for="name">Name</label> <input type="name" class="form-control" id="name" name="name" value="{{old("name")}}" placeholder="Key name"> </div>

                        @if(isset($uniqueError))


                        <span class="invalid-feedback d-block" role="alert">{{$uniqueError}}</span>@endif
    @error('name')
                <span class="invalid-feedback d-block" role="alert"> {{$message}}</span>
  @enderror
                    </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                         <label for="extra">Extra</label>
    <input type="text" class="form-control" id="extra" name="extra" placeholder="Extras Json Format" value="{{old("extra")}}">
    @error('extra')
                <span class="invalid-feedback d-block" role="alert"> {{$message}}</span>
  @enderror
 </div>
                    </div>
                </div>
            </div>
<br><br>
             <button class="btn btn-success btn-block confirm-button" id="confirm" style="width:300px;margin-left:20px;"type="submit">Create</button>
        </div>
    </div>
</div>
</form>





@endsection
