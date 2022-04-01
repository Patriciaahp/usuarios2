<div>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <div class="shadow p-3 mb-5 bg-body rounded row" >
        <h1 class="col">Create User </h1>
    </div>
    <div class="container-sm">
        <div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end col">
                <a href="{{ route('users') }}" class="btn btn-outline-success" type="button">Users List</a>
            </div>
        </div>
        <form action="{{ route('store') }}" method="POST">
            @csrf
        <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Surname</label>
                <input type="text" name="surname"  class="form-control" id="surname">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email"  class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password"  class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit"  class="btn btn-primary">Create User</button>
        </form>
    </div>
</div>
