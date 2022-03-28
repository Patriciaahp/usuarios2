<div>
    <div class="shadow p-3 mb-5 bg-body rounded row" >
        <h1 class="col">User List</h1>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end col">
            <button class="btn btn-primary" type="button">Filtrar</button>
        </div>

        <select class=" col form-select" aria-label="Default select example" wire:model="per_page">
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
            <option value="30">30</option>
        </select>

    </div>

    <table class="table table-hover" >
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Surname</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->surname}}</td>
                <td>{{$user->email}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</div>
