<table class="table table-hover">
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
                    <a class="text-secondary"  href="{{ route('edit',['id' => $user->id]) }}">
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
