<div>
    <div class=" container-xxl shadow p-3 mb-5 bg-body rounded">
        <h1>User List</h1>
        @include('users.shared._filters')
    </div>
    <div class="container-sm">
        @if($users->count())
            @include('users.shared._table')
        @else
            <h3>Not found users... </h3>
        @endif
        {{ $users->links() }}
    </div>
</div>
