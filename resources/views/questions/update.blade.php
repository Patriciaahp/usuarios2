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

    <div class="white p-4">
        @if ($errors->any())
            @include('questions.shared._errors')
        @else
            @include('questions.shared._infoUpdated')
        @endif
        <form action="{{ route('questions.update', $question) }}" method="POST">
            {{ method_field('PUT') }}
            @csrf
            <div class="container-sm row mx-auto ">
                @switch($question->type_id)
                    @case(1)
                    @include('questions.edit-input-text')
                    @case(2)
                    @include('questions.edit-message')
                    @case(3)
                    @include('questions.edit-text-area')
                    @case(4)
                    @include('questions.edit-single-choice')
                @endswitch
                <div>
                    <button type="submit" class="btn btn-success">Update Question</button>
                </div>
            </div>
        </form>
@endsection
