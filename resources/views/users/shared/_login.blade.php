<div>
    @guest
        <a class="btn btn-success btn-lg rounded-pill padding" type="button" href="{{ route('login') }}">Login</a>

    @else
        <a class="btn btn-danger btn-lg rounded-pill padding" type="button" href="{{ route('logout') }}">Logout</a>

    @endguest
</div>
