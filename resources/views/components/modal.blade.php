 @props(['id', 'modalButton' => '', 'modalHeader', 'save', 'withButton' => false])

 <!-- Button trigger modal -->
 @if ($withButton)
     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{ $id }}">
         {{ $modalButton }}
     </button>
 @endif

 <!-- Modal -->
 <div class="modal fade" id="{{ $id }}" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalCenterTitle">{{ $modalHeader }}</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form enctype="multipart/form-data">
                 <div class="modal-body">
                     {{ $slot }}
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                         Close
                     </button>
                     <button type="submit" class="btn btn-primary" id="{{ $save }}">Save changes</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
