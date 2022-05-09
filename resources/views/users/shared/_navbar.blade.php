<nav class="navbar navbar-expand-sm navbar-light bg-dark container-fluid">
    <button class="btn-lg btn-dark rounded-pill">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-bricks"
             viewBox="0 0 16 16">
            <path
                d="M0 .5A.5.5 0 0 1 .5 0h15a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5H14v2h1.5a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5H14v2h1.5a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5H2v-2H.5a.5.5 0 0 1-.5-.5v-3A.5.5 0 0 1 .5 6H2V4H.5a.5.5 0 0 1-.5-.5v-3zM3 4v2h4.5V4H3zm5.5 0v2H13V4H8.5zM3 10v2h4.5v-2H3zm5.5 0v2H13v-2H8.5zM1 1v2h3.5V1H1zm4.5 0v2h5V1h-5zm6 0v2H15V1h-3.5zM1 7v2h3.5V7H1zm4.5 0v2h5V7h-5zm6 0v2H15V7h-3.5zM1 13v2h3.5v-2H1zm4.5 0v2h5v-2h-5zm6 0v2H15v-2h-3.5z"/>
        </svg>
        <a href="{{ route('welcome') }}" class="navbar-brand text-light">UserApp</a>
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
