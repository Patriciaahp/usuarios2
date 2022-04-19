@extends('layouts.layout')
@section('title', 'Login')
@section('heading')
    <h1 class="col">Users</h1>
@endsection
@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="container-fluid teal row p-3">

        <div class="container-fluid col col-6">
            <h1 class="text-center">Welcome</h1>
            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="36" fill="currentColor"
                 class="col bi bi-box-arrow-in-right"
                 viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                      d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                <path fill-rule="evenodd"
                      d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
            </svg>
        </div>
        <div class="container-fluid col col-6 white p-3">
            <h3 class=" text-center">Login</h3>
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
@endsection
