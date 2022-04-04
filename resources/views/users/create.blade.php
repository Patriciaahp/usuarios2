@extends('layouts.app')

@section('title', 'User Edit')

@section('content')
    <div class="shadow p-3 mb-5 bg-body rounded row" >
        <h1 class="col">Create User</h1>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end col">
            <a href="{{ route('users') }}" class="btn btn-outline-primary" type="button">User List</a>
        </div>
    </div>
    <div class="container-sm">
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
@endsection
