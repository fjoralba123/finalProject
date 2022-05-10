<form action="{{route('keys.destroy'
,$key->id)}}" method="post" >
{{method_field('delete')}}
{{csrf_field()}}
   

    <div class="modal fade" id="ModalDelete{{$key->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">{{__('Key Delete')}}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
</div>
<div class="modal-body">Are you sure you want to delete this key? <b>{{$key->name}}</b>?</div>
<div class="modal-footer">
    <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">{{__('Cancel')}}</button>

    <button type="submit" class="btn  btn-outline-danger" data-dismiss="modal">{{__('Delete')}}</button>
</div>
</div>
</div>
</div>

</form>
