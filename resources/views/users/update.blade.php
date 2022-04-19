@extends('layouts.layout')

@section('title', 'User Edit')
@section('heading')

    <h1>Edit User</h1>
    <h2> {{ $user->email }}</h2>
    @include('users.shared._buttonHome')

@endsection
@section('content')

    @if ($errors->any())
        @include('users.shared._errors')
    @else
        @include('users.shared._infoUpdate')
    @endif
    <form action="{{ route('update', $user) }}" method="POST">
        {{ method_field('PUT') }}
        @csrf
        @include('users.shared._fields')
        <div>
            <button type="submit" class="btn btn-success">Edit User</button>
        </div>
    </form>
@endsection
