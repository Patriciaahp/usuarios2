<div class="dropdown">
    <button class="button tealOutline dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
        Actions
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        @if($user->active == true)
            <a class="dropdown-item" id="button1" title="Change state to inactive"
               href="{{ route('inactive',['id' => $user->id]) }}">Deactivate</a>
        @else
            <a class="dropdown-item" id="button2" title="Change state to active"
               href="{{ route('active',['id' => $user->id]) }}">Activate</a>
        @endif
        <a class="dropdown-item" title="Edit this user" href="{{ route('edit',['id' => $user->id]) }}">
            Edit
        </a>
        <a class="dropdown-item" data-toggle="modal" id="smallButton" data-target="#smallModal"
           data-attr="{{ route('preview',['id' => $user->id]) }}" title="Delete this user"
           class="dropdown-item" href="#">
            Delete
        </a>
    </div>
</div>

