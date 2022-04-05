<div>
    <div class=" container-xxl shadow p-3 mb-5 bg-body rounded">
        <h1>User List</h1>

        @include('users.shared._filters')
    </div>
    <div class="container-sm">
        @include('users.shared._table')
        {{ $users->links() }}
    </div>

</div>
