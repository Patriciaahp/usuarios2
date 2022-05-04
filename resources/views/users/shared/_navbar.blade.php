<nav class="navbar navbar-expand-lg navbar-light bg-dark container-fluid">
    <a class="navbar-brand text-light">UserApp</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse col">
        <ul class=" navbar-nav mr-auto">
            <li class="nav-item p-4">
                @if("forms" != Route::current()->getName())
                    <a class="text-light nav-link disabled" href="{{ route('users') }}">User List</a>
                @else
                    <a class="nav-link text-light" href="{{ route('users') }}">User List</a>
                @endif
            </li>
            <li class="nav-item p-4">
                @if("forms" == Route::current()->getName())
                    <a class="nav-link disabled text-light" href="{{ route('forms') }}">Form List</a>
                @else
                    <a class="nav-link text-light" href="{{ route('forms') }}">Form List</a>
                @endif            </li>
        </ul>
    </div>
    <div lass="collapse navbar-collapse col ">
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
