<div>
    <ul>
        @guest
            <li>
                <a href="{{ route('login') }}">Login</a>
            </li>
        @else
            <li>
                <a href="{{ route('signout') }}">Logout</a>
            </li>
        @endguest
    </ul>
</div>
