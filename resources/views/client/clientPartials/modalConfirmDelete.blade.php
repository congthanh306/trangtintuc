<!-- Modal -->
@foreach ($dataComment as $item)
<div class="modal fade" id="targetID{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this comment?
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <button data-id="{{ $item->id }}" data-token="{{ csrf_token() }}" class="btn btn-danger deleteBtn">Delete</button>       
     </div>
   </div>
 </div>
</div>
@endforeach