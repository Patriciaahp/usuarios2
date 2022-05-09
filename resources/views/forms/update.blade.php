@extends('layouts.layout')

@section('title', 'Form Edit')
@section('heading')
    <div class="container-fluid col col-4">
        <h1>Form Edit</h1>
        <h2>Name: {{$form->name}}</h2>
        <a href="{{ route('forms') }}" class="btn btn-outline-primary" type="button">Form List</a>
    </div>
@endsection
@section('content')
    <div class="white p-4">
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
    </div>
@endsection
