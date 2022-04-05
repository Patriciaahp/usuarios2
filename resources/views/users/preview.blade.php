<div>
    <div>
        <div class="text-center container-sm modal-header row">
            <button type="button" class="close sticky-sm-top" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h1 class="col ">Are you sure?</h1>
        </div>
        <div class="modal-body">
            @include('users.shared._row')
        </div>
        <div class="container-sm modal-footer">
            <div class="row col">
                <a href="{{ route('delete',['id' => $user->id]) }}"
                   class="btn btn-outline-danger" type="button">Yes, I want to delete it</a>
            </div>
            <button type="button" class="btn btn-outline-primary" data-dismiss="modal" aria-label="Close">
                Close
            </button>
        </div>
    </div>
</div>

