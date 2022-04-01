<div>
    <div class="shadow p-3 mb-5 bg-body rounded row" >
        <h1 class="col">Are you sure?</h1>
    </div>
</div>
<div class="container-sm">
    <div class="form-group">
        <label for="name">Name:</label>
        <h3>{{$user->name}}</h3>
    </div>
    <div class="form-group">
        <label for="name">Surname:</label>
        <h3>{{$user->surname}}</h3>
    </div>
    <div class="form-group">
        <label for="name">Email:</label>
        <h3>{{$user->email}}</h3>
    </div>
    <div>
        <button>Yes</button>
        <button>No</button>
    </div>
</div>
