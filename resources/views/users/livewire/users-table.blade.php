<div>
    <div class=" container-xxl shadow p-3 mb-5 bg-body rounded fs-4">
        <h1>User List</h1>
        @include('users.shared._filters')
    </div>
    <div class="container-sm">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="32" fill="currentColor"
                 class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                <path fill-rule="evenodd"
                      d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
            </svg>
            <a href="{{ route('create') }}" class="btn btn-success btn-lg" type="button">New user</a>
        </div>
        @if($users->count())
            @include('users.shared._table')
        @else
            <h3>Not found users... </h3>
        @endif
        <div class="fs-3">
            {{ $users->links() }}
        </div>
    </div>
</div>
