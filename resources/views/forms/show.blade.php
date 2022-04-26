<div>
    <div class="modal-header">
        <h2 class="modal-title">Form Details</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <h1 class="col"></h1>
        <h2>Name: {{$form->name}}</h2>
        <h2>Title: {!!  html_entity_decode($form->title) !!}</h2>
        <h2>Description: {!!  html_entity_decode($form->description) !!}</h2>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</div>
