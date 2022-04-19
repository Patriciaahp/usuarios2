@extends('layouts.layout')

@section('title', 'User Create')
@section('heading')
    <h1 class="col">Create User</h1>
    @include('users.shared._buttonHome')
@endsection
@section('content')
    @if ($errors->any())
        @include('users.shared._errors')
    @else
        @include('users.shared._infoCreate')
    @endif
    <form action="{{ route('store') }}" method="POST">
        @csrf
        @include('users.shared._fields')
        <div>
            <button type="submit" class="btn btn-success">Create User</button>
        </div>
    </form>
@endsection
