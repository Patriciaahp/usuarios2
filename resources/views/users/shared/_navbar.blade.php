<nav class="navbar navbar-expand-sm navbar-light bg-dark container-fluid">
    <a class="navbar-brand text-light">UserApp</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container-fluid row col">
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
    <div class="dropdown">
        <button class=" btn-lg rounded-pill  btn btn-primary dropdown-toggle" type="button"
                id="dropdownMenuButton"
                data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor"
                 class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd"
                      d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="">
                Profile
            </a>
            @guest
                <a class="dropdown-item"
                   href="{{ route('login') }}">Login</a>

            @else
                <a class="dropdown-item"
                   href="{{ route('logout') }}">Logout</a>

            @endguest

        </div>
    </div>
</nav>
