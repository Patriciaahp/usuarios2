<div>
<h1 class="col">Are you sure?</h1>
    @include('users.shared._row')
    <div class="col">
        <a href="{{ route('delete',['id' => $user->id]) }}"
           class="btn btn-danger" type="button">Delete</a>
    </div>
</div>

