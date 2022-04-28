@extends('layouts.layout')

@section('title', 'Form Create')
@section('heading')
    <div class="container-fluid col col-4">
        <h1 class="row col col-6">Create Form</h1>
        <a href="{{ route('forms') }}" class="btn btn-outline-primary row col col-2" type="button">Form List</a>
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
