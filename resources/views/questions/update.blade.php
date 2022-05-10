@extends('layouts.layout')

@section('title', 'Question Update')
@section('heading')
    <div class="container-fluid col col-4">
        <h1 class="row col col-6">Updating Question: {{$question->id}}</h1>
        <a href="{{ route('questions.detail', ['id' => $id]) }}" class="btn btn-outline-primary row col col-4"
           type="button">Back</a>
    </div>
@endsection
@section('content')
    @include('questions.shared._errors')
    <div class="white p-4">
        <form action="{{ route('questions.update', $question) }}" method="POST">
            {{ method_field('PUT') }}
            @csrf
            <div class="container-sm row mx-auto ">
                @include('questions.shared._fields')
                <div>
                    <button type="submit" class="btn btn-success">Update Question</button>
                </div>
            </div>
        </form>
@endsection
