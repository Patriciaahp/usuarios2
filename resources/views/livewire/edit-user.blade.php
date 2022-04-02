<div>
    <div class="shadow p-3 mb-5 bg-body rounded row" >
        <h1 class="col">Edit User</h1>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end col">
            <a  class="btn btn-danger" data-toggle="modal" data-target="#myModal" type="button">Delete
                User</a>

        </div>
    </div>
    </div>
    <div class="container-sm">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="name">Surname:</label>
        <input type="text" name="name" value="" class="form-control">
    </div>
    <div class="form-group">
        <label for="name">Email:</label>
        <input type="text" name="name" value="" class="form-control">
    </div>
    <div class="form-group">
        <label for="name">Password:</label>
        <input type="text" name="name" value="" class="form-control">
    </div>
    <div class="row">
        <div class="col" >
            <button type="button" class="btn btn-success" wire:click="edit()" value="submit">Continue</button>
        </div>
    </div>
</div>
