<div class="dropdown">
    <button class="button tealOutline dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
        Actions
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        @if($user->active == true)
            <a wire:click="active({{ $user->id }})"
               id="{{ $user->id }}" class="dropdown-item cursor: pointer"
               title="Change state to inactive">Deactivate</a>
        @else
            <a wire:click="active({{ $user->id }})"
               id="{{ $user->id }}" class="dropdown-item cursor: pointer" title="Change state to active">Activate</a>
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

