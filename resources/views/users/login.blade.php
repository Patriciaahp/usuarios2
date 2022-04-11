<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <h3 class="card-header text-center">Login</h3>
                <div class="card-body">
                    <form method="POST" action="{{ route('log') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Email:</label>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Password:</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <div>
                            <button type="submit" class="btn btn-success">Sing in</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
