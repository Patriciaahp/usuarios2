<div>
    <div class="shadow p-3 mb-5 bg-body rounded row">
        <h1 class="col">User List</h1>

        @include('users.shared._filters')

    </div>

    <table class="table table-hover">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end col">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="32" fill="currentColor"
                 class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                <path fill-rule="evenodd"
                      d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
            </svg>
            <a href="{{ route('create') }}" class="btn btn-outline-success" type="button">New user</a>

        </div>
        <thead>
        <tr>
            @if(in_array('Id', $selectedColumns))
                <th scope="col">Id</th>
            @endif
            @if(in_array('Name', $selectedColumns))
                <th scope="col">Name</th>
            @endif
            @if(in_array('Surname', $selectedColumns))
                <th scope="col">Surname</th>
            @endif
            @if(in_array('Email', $selectedColumns))
                <th scope="col">Email</th>
            @endif
            @if(in_array('Created_at', $selectedColumns))
                <th scope="col">Created At</th>
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
                <td>
                    <a data-toggle="modal" id="smallButton" data-target="#smallModal"
                       data-attr="{{ route('show',['id' => $user->id]) }}" title="show">
                        <i class="fas fa-eye text-success  fa-lg"></i>
                    </a>
                </td>
                <td>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end col">
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
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
</div>
