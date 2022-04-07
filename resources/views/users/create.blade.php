@extends('layouts.layout')

@section('title', 'User Create')

@section('content')

    @slot('header', 'Crear nuevo usuario')

    <div class="shadow p-3 mb-5 bg-body rounded row">
        <h1 class="col">Create User</h1>
        @include('users.shared._buttonHome')
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('store') }}" method="POST">
        @csrf
        @include('users.shared._fields')

        <div>
            <button type="submit" class="btn btn-success">Create User</button>
        </div>
    </form>
@endsection
