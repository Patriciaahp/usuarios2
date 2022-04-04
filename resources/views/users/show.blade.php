@extends('layout')

@section('title', 'Delete a user')
<h1 class="col">User Details</h1>
@section('content')
    <div class="container-sm">
        <div class="form-group">
            <label for="name">Name:</label>
            <h3>{{$user->name}}</h3>
        </div>
        <div class="form-group">
            <label for="name">Surname:</label>
            <h3>{{$user->surname}}</h3>
        </div>
        <div class="form-group">
            <label for="name">Email:</label>
            <h3>{{$user->email}}</h3>
        </div>
    </div>
@endsection
