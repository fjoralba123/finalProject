@extends ('layouts.app')

@section('content')

<div class="container mt-5 mb-5 justify-content-center">
    <div class="card px-1 py-4">

        <div class="card-body">
            <h4 class="card-title mb-3">Edit Key</h4>


            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <!-- <label for="name">Name</label> -->
                        <label for="name">Name</label> <input type="name" class="form-control" value={{$key->name}} disabled id="name" name="name" placeholder="Key name"> </div>


                    </div>
            </div>
            <form method="post" action="{{route('keys.update'
,['key'=>$key->id])}}">
        @csrf
        @method("put")
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                         <label for="extra">Extra</label>
                          <input type="text" class="form-control" id="extra" name="extra" placeholder="Extras Json Format">
                           @error('extra')
                           <span class="invalid-feedback d-block" role="alert"> {{$message}}</span>
                          @enderror
                   </div>
                </div>
            </div>
            <button class="btn btn-primary btn-block confirm-button" type="submit">Confirm edit</button>
            </form>
            </div>


        </div>
    </div>
</div>






@endsection
