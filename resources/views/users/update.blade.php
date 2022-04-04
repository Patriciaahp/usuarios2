@extends('layouts.layout')

@section('title', 'User Edit')

@section('content')

    <div class="shadow p-3 mb-5 bg-body rounded row" >
        <h1 class="col">Edit User</h1>
      <h2 class="col">{{ $user->email }}</h2>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end col">
            <a href="{{ route('users') }}" class="btn btn-outline-primary" type="button">User List</a>
        </div>
    </div>
<form action="{{ route('update', $user) }}" method="POST">
    {{ method_field('PUT') }}
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input value="{{ $user->name }}" type="text" name="name" id="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="name">Surname:</label>
        <input value="{{ $user->surname }}" type="text" name="surname" id="surname" class="form-control">
    </div>
    <div class="form-group">
        <label for="name">Email:</label>
        <input value="{{ $user->email }}" type="text" name="email" id="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="name">Password:</label>
        <input type="text" name="password" id="password" class="form-control">
    </div>
        <div>
            <button type="submit" class="btn btn-success">Continue</button>
        </div>
</form>
@endsection
