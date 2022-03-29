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

        <label for="exampleDataList" class="form-label"></label>
        <input name="name" wire:model="search" type="text" class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
    </div>
    <div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end col">
            <a href="{{ route('users.create') }}" class="btn btn-outline-success" type="button">New user</a>

        </div>
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
                <td>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end col">
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-primary"
                           type="button">Edit</a>
                    </div>
                </td>
              <td>
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end col">
                      <a  class="btn btn-danger" data-toggle="modal" data-target="#myModal" type="button">Delete</a>
                  </div>
              </td>
            </tr>
        @endforeach
        </tbody>
    </table>
<div class="container-sm">
    {{ $users->links() }}
</div>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content text-center">
                <h4>Are you sure?</h4>

            <div class="modal-body text-center">
                  <h3>Delete {{$user->name}}</h3>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Yes</button>
                </div>
            </div>
        </div>
</div>
</div>
</div>
