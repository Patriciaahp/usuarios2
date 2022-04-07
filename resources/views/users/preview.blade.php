<div>
    <div>
        <div class="text-center container-sm modal-header row">
            <h1 class="col ">Are you sure?</h1>
        </div>
        <div class="modal-body">
            @include('users.shared._row')
        </div>
        <div class="container-sm modal-footer">
            <div class="row col">
                <form action="{{ route('delete',['id' => $user->id]) }}" method="POST">
                    <input name="_method" type="hidden" value="DELETE">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Yes, I want to delete this user</button>
                </form>
            </div>
            <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                Close
            </button>
        </div>
    </div>
</div>

