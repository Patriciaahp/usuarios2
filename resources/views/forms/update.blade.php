@extends('layouts.layout')

@section('title', 'Form Edit')
@section('heading')

    <h1>Form User</h1>
    <h2>{!!  html_entity_decode($form->name) !!}</h2>
    <a href="{{ route('forms') }}" class="btn btn-outline-primary" type="button">Form List</a>

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
