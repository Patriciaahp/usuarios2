@extends('layouts.layout')

@section('title', 'Form Edit')
@section('heading')
    <div class="container-fluid col col-4">
        <h1>Form User</h1>
        <h2>Name: {{$question->name}}</h2>
        <a href="{{ route('forms.form.view') }}" class="btn btn-outline-primary col col-2" type="button">Form List</a>
    </div>
@endsection
@section('content')

    @if ($errors->any())
        @include('users.shared._errors')
    @else
        @include('forms.shared._infoUpdated')
    @endif
    <form action="{{ route('forms.update', $form) }}" method="POST">
        {{ method_field('PUT') }}
        @csrf
        @include('forms.shared._rows')
        <div>
            <button type="submit" class="btn btn-success">Edit Form</button>
        </div>
    </form>
@endsection
