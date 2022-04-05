<td>
    <a data-toggle="modal" id="smallButton" data-target="#smallModal"
       data-attr="{{ route('show',['id' => $user->id]) }}" title="show">
        <i class="fas fa-eye text-success  fa-lg"></i>
    </a>
</td>
<td>
    <div>
        <a class="text-secondary" href="{{ route('edit',['id' => $user->id]) }}">
            <i class="fas fa-edit text-gray-300"></i>
        </a>
    </div>
</td>
<td>
    <a data-toggle="modal" id="smallButton" data-target="#smallModal"
       data-attr="{{ route('preview',['id' => $user->id]) }}" title="show">
        <i class="fas fa-trash text-danger  fa-lg"></i>
    </a>
</td>