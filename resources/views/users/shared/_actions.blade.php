{{--    <div>
        <a class="text-secondary" href="{{ route('edit',['id' => $user->id]) }}" title="Edit this user">
            <i class="fas fa-edit text-gray-300"></i>
        </a>
    </div>
</td>
<td>
    <a data-toggle="modal" id="smallButton" data-target="#smallModal"
       data-attr="{{ route('preview',['id' => $user->id]) }}" title="Delete this user">
        <i class="fas fa-trash text-danger  fa-lg"></i>
    </a>--}}


<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
            aria-expanded="false">
        Select action
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#">Active</a>
        <a class="dropdown-item" href="#">Inactive</a>
        <a class="dropdown-item" href="#">
            <a class="text-secondary" href="{{ route('edit',['id' => $user->id]) }}" title="Edit this user">
                <span role="button">Edit</span>
            </a></a>
        <a class="dropdown-item" href="#">
            <a data-toggle="modal" id="smallButton" data-target="#smallModal"
               data-attr="{{ route('preview',['id' => $user->id]) }}" title="Delete this user">
                <span role="button">Delete</span>
            </a></a>
    </div>
</div>