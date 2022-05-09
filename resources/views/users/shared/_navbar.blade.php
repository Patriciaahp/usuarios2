<nav class="navbar navbar-expand-sm navbar-light bg-dark container-fluid">
    <a class="navbar-brand text-light">UserApp</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container-fluid row col col-6">
        @if("forms" != Route::current()->getName())
            <div class="collapse navbar-collapse">
                <ul class=" navbar-nav mr-auto">
                    <li class="nav-item p-4">
                        <a class="text-light nav-link disabled" href="{{ route('users') }}">User List</a>
                    </li>
                </ul>
            </div>
        @else
            <div class="col-2">
                <ul class=" navbar-nav mr-auto">
                    <li class="nav-item p-4">
                        <a class="nav-link text-light" href="{{ route('users') }}">User List</a>
                    </li>
                </ul>
            </div>
        @endif

        @if("forms" == Route::current()->getName())
            <div class="collapse navbar-collapse">
                <ul class=" navbar-nav mr-auto">
                    <li class="nav-item p-4">
                        <a class="nav-link disabled text-light" href="{{ route('forms') }}">Form List</a>
                    </li>
                </ul>
            </div>
        @else
            <div>
                <ul class=" navbar-nav mr-auto">
                    <li class="nav-item p-4">
                        <a class="nav-link text-light" href="{{ route('forms') }}">Form List</a>
                    </li>
                </ul>
            </div>
        @endif
    </div>
    <div>
        <ul class="navbar-nav mr-auto">
            @guest
                <a class="btn btn-success btn-lg rounded-pill padding" type="button"
                   href="{{ route('login') }}">Login</a>

            @else
                <a class="btn btn-danger btn-lg rounded-pill padding" type="button"
                   href="{{ route('logout') }}">Logout</a>

            @endguest
        </ul>
    </div>
</nav>
