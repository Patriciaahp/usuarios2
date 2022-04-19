@extends('layouts.layout')
@section('title', 'Reset your password')
@section('heading')
    <h1 class="col">Enter you new password</h1>
@endsection
@section('content')
    <form action="{{ route('updatePassword', $user) }}" method="POST">
        {{ method_field('PUT') }}
        @csrf
        <div class="form-group">
            @if ($errors->any())
                @include('users.shared._errors')
            @else
                @include('users.shared._infoReset')
            @endif
            <label for="name">Password:</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div>
            <button type="submit" class="btn btn-success">Create Password</button>
        </div>
    </form>
@endsection
