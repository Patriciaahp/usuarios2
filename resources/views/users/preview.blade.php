<div>
    <h1 class="col">Are you sure?</h1>
    <h4 class="text-decoration-underline">You won't be able to revert this!</h4>
    @include('users.shared._row')
    <div class="col">
        <a href="{{ route('delete',['id' => $user->id]) }}"
           class="btn btn-danger" type="button">Yes, I want to delete it</a>
    </div>
</div>

