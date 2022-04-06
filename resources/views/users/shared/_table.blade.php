<table class="table table-hover  fs-4">
    <thead>
    <tr>
        @if(in_array('Id', $selectedColumns))
            <th wire:click="sort('users.id')" scope="col">
                <span role="button">Id</span>
            </th>
        @endif
        @if(in_array('Name', $selectedColumns))
            <th wire:click="sort('users.name')" scope="col">
                <span role="button">Name</span>
            </th>
        @endif
        @if(in_array('Surname', $selectedColumns))
            <th wire:click="sort('users.surname')" scope="col">
                <span role="button">Surname</span>
            </th>
        @endif
        @if(in_array('Email', $selectedColumns))
            <th wire:click="sort('users.email')" scope="col">
                <span role="button">Email</span>
            </th>
        @endif
        @if(in_array('Created_at', $selectedColumns))
            <th wire:click="sort('users.created_at')" scope="col">
                <span role="button">Created At</span>
            </th>
        @endif
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            @if(in_array('Id', $selectedColumns))
                <th scope="row">{{$user->id}}</th>
            @endif
            @if(in_array('Name', $selectedColumns))
                <td>{{$user->name}}</td>
            @endif
            @if(in_array('Surname', $selectedColumns))
                <td>{{$user->surname}}</td>
            @endif
            @if(in_array('Email', $selectedColumns))
                <td>{{$user->email}}</td>
            @endif
            <td>
                @if(in_array('Created_at', $selectedColumns))
                    {{$user->created_at}}
                @endif
            </td>
            @include('users.shared._actions')
        </tr>
    @endforeach
    </tbody>
</table>