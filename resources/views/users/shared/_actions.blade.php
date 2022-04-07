<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
            aria-expanded="false">
        Actions
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        @if($user->active == true)
            <a class="dropdown-item" title="Change state to inactive"
               href="{{ route('inactive',['id' => $user->id]) }}">Deactivate</a>
        @else
            <a class="dropdown-item" title="Change state to active"
               href="{{ route('active',['id' => $user->id]) }}">Activate</a>
        @endif
        <a class="dropdown-item" title="Edit this user" href="{{ route('edit',['id' => $user->id]) }}">
            Edit
        </a>
        <a data-toggle="modal" id="smallButton" data-target="#smallModal"
           data-attr="" title="Delete this user"
           class="dropdown-item" href="{{ route('preview',['id' => $user->id]) }}">
            Delete
        </a>
    </div>
</div>
