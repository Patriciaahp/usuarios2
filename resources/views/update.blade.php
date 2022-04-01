<div>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <div class="shadow p-3 mb-5 bg-body rounded row" >
        <h1 class="col">Edit User</h1>
      <h2 class="col">{{ $user->email }}</h2>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end col">
            <a  class="btn btn-danger" data-toggle="modal" data-target="#myModal" type="button">Delete
                User</a>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end col">
            <a href="{{ route('users') }}" class="btn btn-outline-primary" type="button">Volver</a>
        </div>
    </div>
</div>
<form action="{{ route('update', $user) }}" method="POST">
    {{ method_field('PUT') }}
    @csrf
<div class="container-sm">
    <div class="form-group">
        <label for="name">Name:</label>
        <input value="{{ $user->name }}" type="text" name="name" id="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="name">Surname:</label>
        <input value="{{ $user->surname }}" type="text" name="surname" id="surname" class="form-control">
    </div>
    <div class="form-group">
        <label for="name">Email:</label>
        <input value="{{ $user->email }}" type="text" name="email" id="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="name">Password:</label>
        <input type="text" name="password" id="password" class="form-control">
    </div>
        <div>
            <button type="submit" class="btn btn-success">Continue</button>
        </div>
    </div>

    </form>
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content text-center">
                    <h4>Are you sure?</h4>
                    <div class="modal-body text-center">
                        <h3>Delete</h3>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal"
                            >Yes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
