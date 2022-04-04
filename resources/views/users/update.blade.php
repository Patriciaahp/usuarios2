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
@include('users._fields')
        <div>
            <button type="submit" class="btn btn-success">Continue</button>
        </div>
</form>
@endsection
