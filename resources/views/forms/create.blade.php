@extends('layouts.layout')

@section('title', 'Form Create')
@section('heading')
    <h1 class="col ">Create Form</h1>
    <div>
        <a href="{{ route('forms') }}" class="btn btn-outline-primary" type="button">Form List</a>
    </div>

@endsection
@section('content')
    @if ($errors->any())
        @include('users.shared._errors')
    @else
        @include('forms.shared._infoCreated')
    @endif
    <form action="{{ route('forms.store') }}" method="POST">
        @csrf
        @include('forms.shared._rows')
        <div>
            <button type="submit" class="btn btn-success">Create Form</button>
        </div>
    </form>
@endsection
