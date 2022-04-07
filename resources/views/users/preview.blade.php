<div>
    <div>
        <div class="text-center container-sm modal-header row">
            <h1 class="col ">Are you sure?</h1>
            <button type="button" class="close col col-2" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @include('users.shared._row')
        </div>
        <div class="container-sm modal-footer row">
            <button type="button" class="btn btn-secondary col col-2" data-dismiss="modal">Close</button>
            <div class="col">
                <form action="{{ route('delete',['id' => $user->id]) }}" method="POST">
                    <input name="_method" type="hidden" value="DELETE">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Yes, I want to delete this user</button>
                </form>
            </div>
        </div>
    </div>
</div>

