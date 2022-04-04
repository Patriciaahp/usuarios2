@extends('layout')

@section('title', 'Delete a user')
<h1 class="col">Are you sure?</h1>

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
        <div class="d-grid gap-2 d-md-flex justify-content-md-end row">
            <div>
                <div class="col">
                    <a href="{{ route('delete',['id' => $user->id]) }}" class="btn btn-danger"
                       type="button">Delete</a>
                </div>
            </div>
            <div class="col">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">No</span>
                </button>
            </div>
        </div>
    </div>

@endsection
