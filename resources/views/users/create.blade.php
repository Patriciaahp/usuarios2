@extends('layouts.layout')

@section('title', 'User Create')

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
            @include('users._fields')

            <button type="submit"  class="btn btn-primary">Create User</button>
        </form>
    </div>
@endsection
