@extends('layouts.layout')

@section('title', 'User Edit')

@section('content')

    <div class="shadow p-3 mb-5 bg-body rounded row">
        <h1>Edit User</h1>
        <h2 class="col">{{ $user->email }}</h2>
        @include('users.shared._buttonHome')
    </div>

    <form action="{{ route('update', $user) }}" method="POST">
        {{ method_field('PUT') }}
        @csrf
        @include('users.shared._fields')
        <div>
            <button type="submit" class="btn btn-success">Edit User</button>
        </div>
    </form>
@endsection
